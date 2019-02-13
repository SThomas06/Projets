#include <DHT.h>
#include <math.h>

#define DHTTYPE DHT22
#define DELAY 2000    //Delai imposé à chaque fin de boucle
#define DHTPIN 4      //Port digital
#define PIN_CONTROL 7 //Port digital
#define THRESHOLD 5   //Seuil / Marge d'erreur autour de la consigne
#define ALERTE_ROSEE 1 //Ajout de x °C à la température de point de rosée

float consigne = 0;
float consignePASSE_B = 0;
float consignePASSE_H = 0;
bool state = false;
float tempPtRosee = 0;

DHT dht(DHTPIN, DHTTYPE);

#include "getData.h"
#include "setFridge.h"

void setup() {
  Serial.begin(9600);
  pinMode(PIN_CONTROL,OUTPUT);
  dht.begin();
  Serial.print("MERCI DE CHOISIR LA TEMPERATURE DE CONSIGNE:\t");
  
  while (Serial.available() == 0);  consigne = Serial.parseInt();                       // Fonction scanf sous Arduino
  defineThreshold(&consigne, &consignePASSE_B, &consignePASSE_H);                       // Calcul de la marge d'erreur
  
  Serial.print("CONSIGNE: ");  Serial.print(consigne); Serial.println("°C"); Serial.println("PLAGE:"); 
  Serial.print("PLAGE_BAS:"); Serial.print(consignePASSE_B); Serial.print(" PLAGE_HAUT:");  Serial.println(consignePASSE_H);
}

void loop() {
  call_dht22(&tempPtRosee);
  state = call_pt100(tempPtRosee);       //RETURN 1 IF TOO HOT
  
  if(state == true){
    callFridgeControl_ON();
  }
  else {
    callFridgeControl_OFF();
  }
  delay(DELAY);
}

