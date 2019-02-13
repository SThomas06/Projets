long randNumber,frequence;
unsigned long time;
int boucle = 0 ;                   // initialise une variable pour la boucle

void loop() {
  while((millis())<60000){ //lance la boucle pendant 60 secondes
    analogRead(0);

    while (boucle < 1)
    {
      randNumber = random (525 , 600);
      Serial.print(randNumber);
      Serial.print(";");
      Serial.println(millis());
      boucle=boucle+1;
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
    
    if (boucle = 1 && boucle < 2)
    {
      while (boucle < 2)
      {
        randNumber = random(700 , 775);
        Serial.print(randNumber);
        Serial.print(";");
        Serial.println(millis());
        boucle=boucle+1;
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
    boucle = 0;            
    }
    //time = millis();
    }



