/*
 * Created by ArduinoGetStarted.com
 *
 * This example code is in the public domain
 *
 * Tutorial page: https://arduinogetstarted.com/tutorials/arduino-temperature-humidity-sensor
 */

#include "DHT.h"
#define DHTPIN A0
#define DHTTYPE DHT11

DHT dht(DHTPIN, DHTTYPE);

const int buzzer = 8; //buzzer to arduino pin 8
float oHumi, humi, oTempC, tempC, oTempF, tempF;

void setup() {
  Serial.begin(9600);
  // Serial.println("DHT sensor test!");
  // Serial.println("================");
  dht.begin(); // initialize the sensor
}

void loop() {
  
  // wait a few seconds between measurements.
  delay(2000);

  // read humidity
  humi  = dht.readHumidity();
  // read temperature as Celsius
  tempC = dht.readTemperature();
  // read temperature as Fahrenheit
  tempF = dht.readTemperature(true);

  // compare value 
  if ( oHumi != humi || oTempC != tempC || oTempF != tempF ) tempChanged();
  
}

void playTone() {
  tone(buzzer, 600);  // Send 1KHz sound signal...
  delay(100);         // ...for 1 sec
  noTone(buzzer);     // Stop sound...
  delay(100);         // ...for 1sec
}

void tempChanged() {
  
  // check if any reads failed
  if (isnan(humi) || isnan(tempC) || isnan(tempF)) {
    Serial.println("Failed to read from DHT sensor!");
    
  } else {
    
    String data = (String) "'" + round(humi) + "', '" + round(tempC) + "', '" + round(tempF) + "'";
    Serial.println( data );
    playTone();
    
  }
  
  // Save old results
  oHumi = humi;
  oTempC = tempC;
  oTempF = tempF;
}
