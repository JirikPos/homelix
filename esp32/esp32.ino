#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "Jiraskova 317";
const char* password = "kamitrans2";
const char* serverUrl = "http://tvuj-server.cz/api.php";  // změň podle potřeby

void setup() {
  Serial.begin(9600);
  Serial2.begin(9600, SERIAL_8N1, 16, 17);
  WiFi.begin(ssid, password);

  Serial.println("Připojuji se na Wi-Fi...");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("\n✅ Připojeno k Wi-Fi");
}

void loop() {
  if (Serial2.available()) {
    String data = Serial2.readStringUntil('\n');

    while (Serial2.available()) {
      char c = Serial2.read();
      Serial.write(c);  // Přímo vypisuje znaky z linky
    }
    // String data = Serial2.readStringUntil('\n');  // načti celou řádku
    data.trim();
    Serial.println(data);
    Serial.print("📥 Serial2 count: ");
    Serial.println(Serial2.available());

    Serial.print("📥 DATA: ");
    Serial.println(data);

    if (data.length() > 0 && WiFi.status() == WL_CONNECTED) {
      HTTPClient http;
      http.begin(serverUrl);
      http.addHeader("Content-Type", "application/json");
      // připrav JSON s daty
      String payload = "{\"deviceId\":\"arduino-01\",\"sensors\":\"" + data + "\"}";

      int httpCode = http.POST(payload);
      String response = http.getString();

      Serial.print("📤 Odesláno: ");
      Serial.println(payload);
      Serial.print("✅ Status: ");
      Serial.println(httpCode);
      Serial.print("🔁 Server: ");
      Serial.println(response);

      http.end();
    }
  }
}
