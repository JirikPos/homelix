<?php

class SmartHomeService
{
  public function __construct(
    private Sensor $sensorRepo,
    private SensorReading $readingRepo,
    private Scene $sceneRepo,
    private KeypadEntry $keypadRepo,
    private Keypad $keypadModel,
    private Peripheral $peripheralModel,
    private PeripheralState $peripheralStateModel,
    private Alert $alertRepo,
    private EmailService $notificationService
  ) {}

  public function evaluateSystem(): void
  {
    $activeScene = $this->sceneRepo->getActive();
    if (!$activeScene) return;

    switch (strtoupper($activeScene['name'])) {
      case 'AWAY':
        $this->handleAwayScene();
        break;
      case 'NIGHT':
        $this->handleNightScene();
        break;
      // Můžeš přidat další scény: DAY, ARRIVE atd.
    }

    $this->checkKeypadForDeactivation();
  }

  private function handleAwayScene(): void
  {
    // Kontrola PIR čidel
    $motionSensors = $this->sensorRepo->getByType('PIR');
    foreach ($motionSensors as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && (int)$reading['value_bool'] === 1) {
        $this->notificationService->send('admin@example.com', 'Pohyb detekován', 'pohyb');
        $this->alertRepo->setAlarm(true);
        break;
      }
    }

    // Kontrola čidel na vodu
    $waterSensors = $this->sensorRepo->getByType('WATER');
    foreach ($waterSensors as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && (int)$reading['value_bool'] === 1) {
        $this->notificationService->send('admin@example.com', 'Únik vody detekován', 'voda');
        $this->alertRepo->setAlarm(true);
        break;
      }
    }

    // Kontrola plynu
    $gasSensors = $this->sensorRepo->getByType('GAS');
    foreach ($gasSensors as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && $reading['value_float'] > 600) {
        $this->notificationService->send('admin@example.com', 'Únik plynu detekován', 'plyn');
        $this->alertRepo->setAlarm(true);
        break;
      }
    }
  }

  private function handleNightScene(): void
  {
    // Detekce pohybu v noci
    $motionSensors = $this->sensorRepo->getByType('PIR');
    foreach ($motionSensors as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && (int)$reading['value_bool'] === 1) {
        $this->notificationService->send('admin@example.com', 'Noční pohyb detekován', 'pohyb');
        $this->alertRepo->setAlarm(true);
        break;
      }
    }

    // Detekce vysoké teploty
    $tempSensors = $this->sensorRepo->getByType('TEMPERATURE');
    foreach ($tempSensors as $sensor) {
      $reading = $this->readingRepo->getLastBySensorId((int)$sensor['id']);
      if ($reading && $reading['value_float'] > 30.0) {
        $this->notificationService->send('admin@example.com', 'Vysoká teplota detekována', 'teplota');
        $this->alertRepo->setAlarm(true);
        break;
      }
    }
  }

  private function checkKeypadForDeactivation(): void
  {
    $entry = $this->keypadRepo->getLast();
    if ($entry && $entry['code'] === 1234) {
      $this->alertRepo->deactivateAll();
    }
  }
}
