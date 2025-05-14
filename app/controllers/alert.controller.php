<?php
// app/controllers/AlertLogController.php
class AlertLogController
{
    private AlertLog $model;

    public function __construct(AlertLog $model)
    {
        $this->model = $model;
    }

    public function index(): void
    {
        $logs = $this->model->getAll();
        include __DIR__ . '/../views/alert_logs.php';
    }

    public function data(): void
    {
        header('Content-Type: application/json');
        echo json_encode($this->model->getAll());
    }

    public function show(): void
    {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);
        $item = $this->model->getById($id);
        http_response_code($item ? 200 : 404);
        echo json_encode($item);
    }

    public function bySensor(): void
    {
        header('Content-Type: application/json');
        $sensorId = (int)($_GET['sensor_id'] ?? 0);
        $limit    = isset($_GET['limit']) ? (int)$_GET['limit'] : 50;
        echo json_encode($this->model->getBySensor($sensorId, $limit));
    }

    public function store(): void
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
        $id = $this->model->create(
            (int)$input['sensor_id'],
            $input['reading_id'] ?? null,
            (float)$input['value'],
            $input['threshold_type']
        );
        echo json_encode(['id' => $id]);
    }

    public function delete(): void
    {
        header('Content-Type: application/json');
        $id = (int)($_GET['id'] ?? 0);
        $success = $this->model->delete($id);
        echo json_encode(['success' => $success]);
    }
}
