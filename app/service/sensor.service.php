<?php
namespace SensorService;

use SensorModel\SensorModel;

class SensorService {
    public static function process(Sensor $sensor): void {
        foreach ($sensor->sensors as $key => $value) {
            if ($key === 'temperature' && $value > 50) {
                echo "Kritická teplota: $value\n";
            }

            if ($key === 'motion' && $value === true) {
                echo "Detekován pohyb\n";
            }
        }
    }
}
