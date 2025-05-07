<?php
namespace SensorModel;

class SensorModel {
    public string $deviceId;
    public array $sensors;

    public static function fromArray(array $data): self {
        $instance = new self();
        $instance->deviceId = $data['deviceId'] ?? 'unknown';
        $instance->sensors = $data['sensors'] ?? [];
        return $instance;
    }
}
