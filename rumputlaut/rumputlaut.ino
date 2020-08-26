#include <Arduino.h>

// Wifi
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

#define USE_SERIAL Serial
ESP8266WiFiMulti WiFiMulti;
HTTPClient http;

// Sensor DHT
#include <DHT.h>

#define DHTPIN D9
#define DHTTYPE DHT11

DHT dht(DHTPIN, DHTTYPE);

int before_suhu = 25;

// PIN ULTRASONIK
#define echoPin D3
#define trigPin D4

// Relay
#define relay_on LOW
#define relay_off HIGH
#define pengering D5

// Boolean
boolean rumput_kosong = false;
boolean rumput_ada = false;

// URL WEB IOT
String simpan = "http://duniaiot.com/rumputlaut/Data/save?suhu=";
String update_rumput = "http://duniaiot.com/rumputlaut/Data/update?ket=";

String respon;
String rumput;

void setup() {
  Serial.begin(115200);   //Komunikasi baud rate

  USE_SERIAL.begin(115200);
  USE_SERIAL.setDebugOutput(false);

  for(uint8_t t = 4; t > 0; t--) {
      USE_SERIAL.printf("[SETUP] Tunggu %d...\n", t);
      USE_SERIAL.flush();
      delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("Rumput", "12345678"); // Sesuaikan SSID dan password ini

  Serial.println();
  
  for (int u = 1; u <= 5; u++)
  {
    if ((WiFiMulti.run() == WL_CONNECTED))
    {
      USE_SERIAL.println("Wifi konek");
      USE_SERIAL.flush();
      delay(1000);
    }
    else
    {
      Serial.println("Wifi belum konek");
      delay(1000);
    }
  }

  pinMode(echoPin, INPUT);
  pinMode(trigPin, OUTPUT);
  pinMode(pengering, OUTPUT);
  
  digitalWrite(pengering, relay_off);

  dht.begin(); // dht mulai bekerja/ on

  delay(1000);
  Serial.println();
  
}

void loop() {

  // coding suhu
  int suhu = dht.readTemperature();
  if (suhu > 50)
  {
    suhu = before_suhu;  
  }
  else
  {
    before_suhu = suhu;
  }

  // jarak / ultrasonik
  int durasi, jarak, pos=0;
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  durasi = pulseIn(echoPin, HIGH);
  jarak = (durasi / 2) / 29.1;

  if (jarak < 0)
  {
    jarak = 0;
  }

  Serial.print("Jarak Objek : ");
  Serial.println(jarak);

  // update ke database jika ada rumput laut masuk
  if (jarak <= 10)
  {
    if (rumput_ada == false)
    {
      Serial.println("Rumput laut terdeteksi");
      Serial.println();

      rumput = "Rumput laut dalam proses pengeringan";
      
      kirim(1);

      Serial.println();

      rumput_ada = true;
      rumput_kosong = false;
    }
  }
  else
  {
    if (rumput_kosong == false)
    {
      Serial.println("Tidak ada rumput laut");
      Serial.println();

      rumput = "Tidak ada rumput laut";
      
      kirim(0);

      Serial.println();

      rumput_ada = false;
      rumput_kosong = true;
    }
  }

  // kirim data suhu ke website
  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( simpan + (String) suhu );
    
    USE_SERIAL.print("[HTTP] Menyimpan ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK)
      {
        respon = http.getString();
        USE_SERIAL.println("Respon : " + respon);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }

  if (respon.toInt() == 1)
  {
    if (rumput_ada == true)
    {
      digitalWrite(pengering, relay_on);
    }
    else
    {
      digitalWrite(pengering, relay_off);
    }
  }
  else
  {
    if (rumput_ada == true)
    {
      rumput = "Selesai pengeringan";
    }
    digitalWrite(pengering, relay_off);
  }

  Serial.println();

  Serial.print("Suhu : ");
  Serial.println(suhu);
  Serial.print("Keterangan : ");
  Serial.println(rumput);

  Serial.println();

  delay(2000);

}

void kirim(int ket)
{
  if ((WiFiMulti.run() == WL_CONNECTED))
  {
    USE_SERIAL.print("[HTTP] Memulai...\n");
    
    http.begin( update_rumput + (String) ket );
    
    USE_SERIAL.print("[HTTP] Update ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if (httpCode == HTTP_CODE_OK)
      {
        respon = http.getString();
        USE_SERIAL.println("Respon : " + respon);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] GET data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }
}
