#include <WiFi.h>
#include <HTTPClient.h>

// --- Konfig ---
const char* ssid      = "Jiraskova 317";
const char* password  = "kamitrans2";
const char* serverUrl = "http://tvuj-server.cz/api.php";

// --- UART ESP32 ---
#define RX2_PIN 16

void setup() {
  Serial.begin(115200);
  Serial2.begin(9600, SERIAL_8N1, RX2_PIN);

  WiFi.begin(ssid, password);
  Serial.printf("Wi-Fi %s…", ssid);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print('.');
  }
  Serial.println(" OK");
}

void loop() {
  if (!Serial2.available()) return;

  String line = Serial2.readStringUntil('\n');
  line.trim();
  if (!line.startsWith("Temperature:")) return;

  String payload = "{\"deviceId\":\"arduino-01\",\"sensors\":\"" + line + "\"}";
  Serial.println(payload);

  HTTPClient http;
  http.begin(serverUrl);
  http.addHeader("Content-Type", "application/json");
  int code = http.POST(payload);
  http.end();

  if (code > 0) {
    Serial.printf("✅ %d  %s\n", code, payload.c_str());
  } else {
    Serial.printf("❌ HTTP error %d\n", code);
  }
}
