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
        echo json_encode($latest[0] ?? null);
    }
}
