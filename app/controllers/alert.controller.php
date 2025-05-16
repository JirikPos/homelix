<?php
class AlertController
{
    private Alert $model;

    public function __construct(Alert $model)
    {
        $this->model = $model;
    }

    public function getLast(): void
    {
        header('Content-Type: application/json');

        $latest = $this->model->getLatest();

        if ($latest && isset($latest['alarm'])) {
            echo json_encode([
                'active' => (bool)$latest['alarm'],
                'message' => $latest['name'] ?? ''
            ]);
        } else {
            echo json_encode([
                'active' => false,
                'message' => null
            ]);
        }
    }
}
