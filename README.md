# homelix - iot-rack

Chytřejší domov. Jednoduše.

/_ Rozhraní pro data ze senzorů (Arduino DHT11, KY037, LDR, MQ135, vodní senzor, PIR) _/

interface SensorReadings {
  temperature: number;
  humidity: number;
  sound: number;
  light: number;
  gas: number;
  waterLevel: boolean;
  pir: boolean;
}

export interface Keypad {
code: number;
}
