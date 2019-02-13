long randNumber,frequence;
int i = 0 ;                   // initialise une variable pour la boucle
void setup(){
  Serial.begin(9600);
  
  frequence = random(125,500); //permet de trouver la fréquence de l'arrivée des données ( rythme cardiaque)
  
}

void loop() {
  while((millis())<60000){ //lance la boucle pendant 60 secondes

    while (i < 1)
    {
      randNumber = random (525 , 600);
      Serial.print(randNumber);
      Serial.print(";");
      Serial.println(millis());
      i=i+1;
    }
    
    delay(frequence);
    
    if (i = 1 && i < 2)
    {
      while (i < 2)
      {
        randNumber = random(700 , 775);
        Serial.print(randNumber);
        Serial.print(";");
        Serial.println(millis());
        i=i+1;
      }
    }
    delay(frequence);
    i = 0;            
  }
}



