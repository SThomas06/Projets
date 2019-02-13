
void setup() {  
  
 
  pinMode(2, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(8, OUTPUT);
  pinMode(9, OUTPUT);
  pinMode(10, OUTPUT);
  pinMode(11, OUTPUT);
  
  Serial.begin(9600);

}

int choix;
int i=0;

void loop() {

  while(i==0)     //boucle jusqu'à une entrée de LED valable
  {
    Serial.println("Entrez le chiffre de la LED souhaitée : ");
    while (Serial.available() == 0);
    choix = Serial.parseInt(); // correspond à la fonction scanf en C
    Serial.print("Vous avez choisi la LED:  ");
    Serial.println(choix);
    
    if ((choix > 10) || (choix < 1))
     {
      Serial.println("La LED choisie est inexistante.");
      Serial.println("Veuillez choisir une LED entre 1 et 10 compris ");
     }
     else i=1; 
  }
  digitalWrite(choix+1,HIGH);
  
  delay(100);
  digitalWrite(choix+1,LOW);
  delay(100);
 
}

