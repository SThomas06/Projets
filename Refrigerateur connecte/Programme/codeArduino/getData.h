float R1 = 10000;           //Résistance 10kOhms
float tensionInitiale = 5;  //5V
float tensionMesure = 0;
float R2 = 0;
float temperatureK = 0;
float temperatureC = 0;
float A = 0.00109613;
float B = 0.000240164;
float C = 5.87433E-08;

bool call_pt100(float tempPtRosee){
  //---------------------------------------------------------------------------------------- LECTURE DE LA TENSION EXERCEE ----//
      tensionMesure = analogRead(A3);                         //Tension mesurée
      tensionMesure = (tensionMesure/1023)*5;
      Serial.print("Tension_Mesuree: ");  Serial.println(tensionMesure);
  //---------------------------------------------------------------------------------------------------------------------------//
  //-------------------------------------------------------------------------------------- CALCUL DE LA RESISTANCE EXERCEE ----//
      R2 = R1 / ((tensionInitiale / tensionMesure) - 1);
      Serial.print("Resistance_exercee: ");  Serial.println(R2);
  //---------------------------------------------------------------------------------------------------------------------------//
  //-------------------------------------------------------------------------------------------------- TEMPERATURE MESUREE ----//
      /*
       *  1/T = A + B * ln(R) + C * ln(R)^3 // Formule de Steinhart-Hart qui permet de calculer la température à partir de la résistance de la thermistance
       *  T = 1 / (A + B * ln(R) + C * ln(R)^3)
       *  D'après l'inéquation fournis dans les ressources : A = 0.00109613 / B = 0.000240164 / C = 5.87433E-08
      */
      temperatureK = 1 / ( A + (  B * log(R2)  ) + (  C * pow(log(R2),3) )  );
      temperatureC = temperatureK - 273.15;
      Serial.print("Temperature_mesureeK: ");  Serial.print(temperatureK);  Serial.print("\tTemperature_mesureeC: ");  Serial.println(temperatureC);  Serial.println("");
  //---------------------------------------------------------------------------------------------------------------------------//
  //-------------------------------------------------------------------------------------------------- DECISION A PRENDRE ----//
      /*
       *  Si la température est trop haute on retourne TRUE.
       *  Sinon on retourne FALSE : soit dans la plage soit trop froid.
       *  Calcul du point de rosée (limite de température avant que l'humidité soit à son apogée, 100%) -> Courbe croissante proportionnellement à la température
      */
      if(temperatureC <= tempPtRosee + ALERTE_ROSEE) {
        if(temperatureC <= tempPtRosee) {
          Serial.println("CONDENSATION DETECTEE !");
        }
        else {
          Serial.println("POINT DE ROSEE BIENTÔT ATTEINT, ATTENTION !");
        }
      }
      else {
        Serial.println("CONDENSATION NON DETECTEE...");
      }
      if(temperatureC > consignePASSE_H) {
        Serial.println("TOO HOT");
        return true; 
      }
      else {
        if(temperatureC < consignePASSE_B) {
          Serial.println("TOO COLD"); 
        }
        else {
          Serial.println("GOOD TEMPERATURE");
        }
        return false;      
      }
  //---------------------------------------------------------------------------------------------------------------------------//
}
  
void call_dht22(float *tempEnv){
  float h = dht.readHumidity();                         // Read humidity
  float t = dht.readTemperature();                      // Read temperature as Celsius (the default)
  float f = dht.readTemperature(true);                  // Read temperature as Fahrenheit (isFahrenheit = true)

  if (isnan(h) || isnan(t) || isnan(f)) {               // Check if any reads failed and exit early (to try again). In library Math.h: isnan(...) return 1 if not a number
    Serial.println("Failed to read from DHT sensor!");
    return;
  }
                                                        // Bibliothèque = température en degrès et heat index = température ressentie
  float hif = dht.computeHeatIndex(f, h);               // Compute heat index in Fahrenheit (the default)
  float hic = dht.computeHeatIndex(t, h, false);        // Compute heat index in Celsius (isFahreheit = false)

  *tempEnv = (pow((h/100.00),(0.125)) * (112.00 + (0.9 * t)) + (0.1 * t) - 112.00);

  Serial.print("Humidity: ");       Serial.print(h);          Serial.print("\t");
  Serial.print("TemperatureC: ");    Serial.print(t);          Serial.print(" C\tTemperatureF: "); Serial.print(f);     Serial.print(" F\t");
  Serial.print("Heat_indexC: ");     Serial.print(hic);        Serial.print(" C\tHeat_indexF: ");  Serial.print(hif);   Serial.println(" F");
  Serial.print("POINT_DE_ROSEE: "); Serial.print(*tempEnv);   Serial.println(" C"); Serial.println("");
}

void defineThreshold(float *consigne,float *passeBas, float *passeHaut){
  *passeBas = *consigne * (1 - (THRESHOLD/100.00));
  *passeHaut = *consigne * (1 + (THRESHOLD/100.00));
}

void RConsigne(){
  if(Serial.available() > 0){
    consigne = 0 ;
    consigne = Serial.parseFloat();
    Serial.print("Votre Temperature est :");
    Serial.println(consigne);
    delay(1500);
 }
}



















