<?php

class PeripheralController
{
  private Peripheral $peripheralModel;
  private PeripheralState $stateModel;

  public function __construct(Peripheral $peripheralModel, PeripheralState $stateModel)
  {
    $this->peripheralModel = $peripheralModel;
    $this->stateModel = $stateModel;
  }

  public function getAll(): void
  {
    header('Content-Type: application/json');
    echo json_encode($this->peripheralModel->getAll());
  }

  public function getStates(): void
  {
    header('Content-Type: application/json');
    echo json_encode($this->stateModel->getAll());
  }

  public function setState(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['id'])) {
      http_response_code(400);
      echo json_encode(['error' => 'Missing peripheral ID']);
      return;
    }

    $id = (int)$input['id'];
    $valueFloat = isset($input['value_float']) ? (float)$input['value_float'] : null;
    $valueBool  = isset($input['value_bool']) ? (bool)$input['value_bool'] : null;

    $this->stateModel->setState($id, $valueFloat, $valueBool);
    echo json_encode(['success' => true]);
  }
}
