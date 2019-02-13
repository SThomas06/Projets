include "Coeur_separe"
long randNumber,frequence;
unsigned long time;
int i = 0 ;                   // initialise une variable pour la boucle
void setup(){
  Serial.begin(9600);
  
  for (int n=2 ; n<=11 ; n++)     //initialise toutes les sorties digitales utilisées en OUTPUT
  {
    pinMode(n,OUTPUT);
  }
  
  randomSeed(analogRead(0)); 
  time = millis();
  
  frequence = random(125,500); //permet de trouver la fréquence de l'arrivée des données ( rythme cardiaque)
  
  
}

void loop() {
  while((millis())<60000){ //lance la boucle pendant 60 secondes
    analogRead(0);

    while (i < 1)
    {
      randNumber = random (525 , 600);
      Serial.print(randNumber);
      Serial.print(";");
      Serial.println(millis());
      i=i+1;
      digitalWrite(2,LOW);
      digitalWrite(3,LOW);
      digitalWrite(4,LOW);
      digitalWrite(5,LOW);
      digitalWrite(6,LOW);
      digitalWrite(7,LOW);
      digitalWrite(8,LOW);
      digitalWrite(9,LOW);
      digitalWrite(10,LOW);
      digitalWrite(11,LOW);
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
        digitalWrite(2,HIGH);
        digitalWrite(3,HIGH);
        digitalWrite(4,HIGH);
        digitalWrite(5,HIGH);
        digitalWrite(6,HIGH);
        digitalWrite(7,HIGH);
        digitalWrite(8,HIGH);
        digitalWrite(9,HIGH);
        digitalWrite(10,HIGH);
        digitalWrite(11,HIGH);
      }
    }
    delay(frequence);
    i = 0;            
    }
    //time = millis();
    }


