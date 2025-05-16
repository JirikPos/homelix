<?php

class SceneController
{
  private Scene $model;
  private Alert $alert;

  public function __construct(Scene $modelScene, Alert $modelAlert)
  {
    $this->model = $modelScene;
    $this->alert = $modelAlert;
  }

  public function getActive(): void
  {
    header('Content-Type: application/json');
    $activeScene = $this->model->getActive();

    if ($activeScene) {
      echo json_encode($activeScene);
    } else {
      echo json_encode(['error' => 'Žádná aktivní scéna']);
    }
  }

  public function getAll(): void
  {
    header('Content-Type: application/json');
    echo json_encode($this->model->getAll());
  }

  public function activate(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);
    $id = isset($input['id']) ? (int)$input['id'] : 0;

    if ($id && $this->model->activate($id)) {
      echo json_encode(['success' => true, 'activated' => $id]);
    } else {
      http_response_code(400);
      echo json_encode(['error' => 'Aktivace scény selhala']);
    }
  }

  public function deactivate(): void
  {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);
    $id = isset($input['id']) ? (int)$input['id'] : 0;
    $this->alert->deactivateAll();

    if ($id && $this->model->deactivate($id)) {
      echo json_encode(['success' => true, 'deactivated' => $id]);
    } else {
      http_response_code(400);
      echo json_encode(['error' => 'Deaktivace scény selhala']);
    }
  }
}
