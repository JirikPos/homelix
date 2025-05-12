#include <DHT.h>
#include <Keypad.h>

// === PINY ===
#define DHTPIN A1
#define DHTTYPE DHT11
#define KY037_PIN A2
#define LDR_PIN A0
#define MQ135_PIN A3
#define WATER_LEVEL_PIN A4
#define PIR_PIN 9
#define PIEZO_PIN 2

// === GLOBÁLNÍ OBJEKTY ===
DHT dht(DHTPIN, DHTTYPE);

// Keypad setup
const byte ROWS = 4;
const byte COLS = 3;
char keys[ROWS][COLS] = {
  { '1', '2', '3' },
  { '4', '5', '6' },
  { '7', '8', '9' },
  { '*', '0', '#' }
};
byte rowPins[ROWS] = { 3, 4, 5, 6 };
byte colPins[COLS] = { 7, 8, 9 };
Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, ROWS, COLS);

// === SETUP ===
void setup() {
  Serial.begin(9600);
  initDHT11();
  initKY037();
  initLDR();
  initMQ135();
  initWaterSensor();
  initPIRSensor();
  initPiezo();
  initKeypad();
  startupSound();
}

// === LOOP ===
void loop() {
  static unsigned long lastSensorUpdate = 0;
  static String inputCode = "";

  // === KEYPAD HANDLING ===
  char key = readKeypad();
  if (key) {
    if (key == '*') {
      if (inputCode.length() > 0) {
        Serial.print("CODE_ENTERED:");
        Serial.println(inputCode);
        inputCode = "";
      }
    } else if (key == '#') {
      inputCode = "";
      Serial.println("CODE_CLEARED");
    } else {
      inputCode += key;
    }
  }

  // === SENZORY KAŽDÉ 2 SEKUNDY ===
  if (millis() - lastSensorUpdate >= 3000) {
    lastSensorUpdate = millis();

    float temp = readDHTTemperature();
    float hum = readDHTHumidity();
    int sound = readKY037();
    int light = readLDR();
    int gas = readMQ135();
    int waterDetected = readWaterSensor();
    bool motionDetected = readPIR();

    Serial.print("Temperature:");
    Serial.print(temp);
    Serial.print(",Humidity:");
    Serial.print(hum);
    Serial.print(",Sound:");
    Serial.print(sound);
    Serial.print(",Light:");
    Serial.print(light);
    Serial.print(",Gas:");
    Serial.print(gas);
    Serial.print(",Water level:");
    Serial.print(waterDetected);
    Serial.print(",PIR:");
    Serial.println(motionDetected);
  }
}



//
// === FUNKCE ===
//

void initDHT11() {
  dht.begin();
}
float readDHTTemperature() {
  return dht.readTemperature();
}
float readDHTHumidity() {
  return dht.readHumidity();
}

void initKY037() {
  pinMode(KY037_PIN, INPUT);
}
int readKY037() {
  return analogRead(KY037_PIN);
}

void initLDR() {
  pinMode(LDR_PIN, INPUT);
}
int readLDR() {
  return analogRead(LDR_PIN);
}

void initMQ135() {
  pinMode(MQ135_PIN, INPUT);
}
int readMQ135() {
  return analogRead(MQ135_PIN);
}

void initWaterSensor() {
  pinMode(WATER_LEVEL_PIN, INPUT);
}
int readWaterSensor() {
  return analogRead(WATER_LEVEL_PIN);
}

void initPIRSensor() {
  pinMode(PIR_PIN, INPUT);
}
bool readPIR() {
  return digitalRead(PIR_PIN) == HIGH;
}

void initPiezo() {
  pinMode(PIEZO_PIN, OUTPUT);
}
void startupSound() {
  tone(PIEZO_PIN, 1000, 200);
  delay(250);
  tone(PIEZO_PIN, 1500, 200);
  delay(250);
  noTone(PIEZO_PIN);
}

void initKeypad() {
  // není potřeba nic, ale pro konzistenci necháno
}
char readKeypad() {
  return keypad.getKey();  // 0 pokud nic
}
