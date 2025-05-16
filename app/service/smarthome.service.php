<?php

class SmartHomeService
{
  private string $notificationEmail;

  public function __construct(
    private Sensor $sensorRepo,
    private SensorReading $readingRepo,
    private Scene $sceneRepo,
    private KeypadEntry $keypadRepo,
    private Peripheral $peripheralModel,
    private PeripheralState $peripheralStateModel,
    private Alert $alertRepo,
    private EmailService $notificationService,
    array $config
  ) {
    $this->notificationEmail = $config['notifications']['to'] ?? 'admin@example.com';
  }

  public function evaluateSystem(): void
  {
    $activeScene = $this->sceneRepo->getActive();
    if (!$activeScene) return;

    switch (strtolower($activeScene['name'])) {
      case 'leave':
        $this->handleAwayScene();
        break;
      case 'night':
        $this->handleNightScene();
        break;
    }

    $this->checkKeypadForDeactivation();
  }

  private function handleAwayScene(): void
  {
    foreach ($this->sensorRepo->getByType('PIR') as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && (int)$reading['value_bool'] === 1) {
        $this->notificationService->send($this->notificationEmail, 'Pohyb detekován', 'pohyb');
        $this->alertRepo->create('Upozornění, pohyb byl detekován. Kontaktuji vlastníka nemovitosti', true);
        break;
      }
    }

    foreach ($this->sensorRepo->getByType('WATER') as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && (int)$reading['value_bool'] === 1) {
        $this->notificationService->send($this->notificationEmail, 'Únik vody detekován', 'voda');
        $this->alertRepo->create('Upozornění, byl detekován únik vody. Kontaktuji vlastníka nemovitosti', true);
        break;
      }
    }

    foreach ($this->sensorRepo->getByType('GAS') as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && $reading['value_float'] > 600) {
        $this->notificationService->send($this->notificationEmail, 'Únik plynu detekován', 'plyn');
        $this->alertRepo->create('Upozornění, byl detekován únik plynu. Kontaktuji vlastníka nemovitosti', true);
        break;
      }
    }
  }

  private function handleNightScene(): void
  {
    foreach ($this->sensorRepo->getByType('PIR') as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && (int)$reading['value_bool'] === 1) {
        $this->notificationService->send($this->notificationEmail, 'Noční pohyb detekován', 'pohyb');
        $this->alertRepo->create('Upozornění, byl detekován pohyb. Kontaktuji vlastníka nemovitosti', true);
        break;
      }
    }

    foreach ($this->sensorRepo->getByType('TEMPERATURE') as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && $reading['value_float'] > 40.0) {
        $this->notificationService->send($this->notificationEmail, 'Vysoká teplota detekována', 'teplota');
        $this->alertRepo->create('Upozornění, byla detekována vysoká teplota. Kontaktuji vlastníka nemovitosti', true);
        break;
      }
    }
  }

  private function checkKeypadForDeactivation(): void
  {
    $entry = $this->keypadRepo->getLast();
    if ($entry && $entry['code'] === "603603") {
      $this->alertRepo->create('Alarm deaktivován klávesnicí', false);
      $this->alertRepo->deactivateAll();
    }
  }
}
