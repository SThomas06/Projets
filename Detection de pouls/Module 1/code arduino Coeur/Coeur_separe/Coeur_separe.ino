#include "coeur.h"
int a = 1000;  // Déclaration de deux entiers qui géreront en fonction du choix de l'utilisateur le delay de la loop.
int b = 1000;
int i = 0;
int z = 0;    // variable qui sert juste à avoir des conditions pour sortir des boucles dans le cas n°11. On est obligé de la délcarer en dehors du loop sinon il faudrait changer la logique des conditions de ce cas.

void setup(){
Serial.begin(9600);
Serial.println("***********DEBUT FICHIER CHOIX AFFICHAGE COEUR**********");
Serial.println("Voici les differents modes d'affichage :");
Serial.println("1 : Allume toutes les LED du coeur à chaque battement");
Serial.println("2 : Allume une LED sur deux à chaque battement");
Serial.println("3 : Allume une LED sur trois à chaque battement");
Serial.println("4 : Allume une LED sur quatre à chaque battement");
Serial.println("5 : Allume une LED sur cinq à chaque battement");
Serial.println("6 : Allume une LED sur six à chaque battement");
Serial.println("7 : Allume une LED sur sept à chaque battement");
Serial.println("8 : Allume une LED sur huit à chaque battement");
Serial.println("9 : Allume une LED sur neuf à chaque battement");
Serial.println("10 : Allume une LED sur dix à chaque battement"); // C'est à dire que la première ici car nous avons que 10 LED !
Serial.println("11 : Allume une LED au choix à chaque battement");
Serial.println("12 : Allume les LED en mode chenille à chaque battement");
Serial.println("");
Serial.println("Veuillez choisir le mode d'affichage du coeur :");
  for (int n = 2 ; n<= 11; n++)
  {
     pinMode(n, OUTPUT);                      // Déclare le port n en sortie de tension
  } 
   /* while (Serial.available() == 0);
    choixAffichageCoeur = Serial.parseInt();      // Fonction scanf sous Arduino*/
    Serial.print("Vous avez choisi l'affichage : ");
    Serial.println(choixAffichageCoeur);
    
    randomSeed(analogRead(0)); 
    time = millis();
    
    frequence = random(125,500); //permet de trouver la fréquence de l'arrivée des données ( rythme cardiaque)
  
}

void loop(){

    if (choixAffichageCoeur == 1){  i = 1; }
    if (choixAffichageCoeur == 2){  i = 2; }
    if (choixAffichageCoeur == 3){  i = 3; }
    if (choixAffichageCoeur == 4){  i = 4; }
    if (choixAffichageCoeur == 5){  i = 5; }
    if (choixAffichageCoeur == 6){  i = 6; }
    if (choixAffichageCoeur == 7){  i = 7; }
    if (choixAffichageCoeur == 8){  i = 8; }
    if (choixAffichageCoeur == 9){  i = 9; }
    if (choixAffichageCoeur == 10){ i = 10; }
    if (choixAffichageCoeur == 11){
                        a = 100;
                        while(z==0)     //boucle jusqu'à une entrée de LED valable
                        {
                        Serial.println("Entrez le chiffre de la LED souhaitée : ");
                        /*while (Serial.available() == 0);
                        choose = Serial.parseInt(); // correspond à la fonction scanf en C*/
                        Serial.print("Vous avez choisi la LED:  ");
                        Serial.println(choose);
                        if ((choose > 10) || (choose < 1))
                        {
                        Serial.println("La LED choisie est inexistante.");
                        Serial.println("Veuillez choisir une LED entre 1 et 10 compris ");
                        }
                        else z=1; 
                        } 
                        digitalWrite(choose+1,HIGH);
                        delay(a);
                        digitalWrite(choose+1,LOW);
                        delay(a); 
                        }
    if (choixAffichageCoeur == 12){
                        i = 1;
                        a = 50;
                        b = 10;
                        for (int n = 2; n<=11 ;n=n+i)   // turn the LED on (HIGH is the voltage level)
                          {
                          digitalWrite(n,HIGH);
                          delay(50);                       // wait for a second
                          digitalWrite(n, LOW);
                          delay(10);// turn the LED off by making the voltage LOW
                          }
                        }
    if (((choixAffichageCoeur != 11) && (choixAffichageCoeur !=12))&&(choixAffichageCoeur <= 12)&&(choixAffichageCoeur >= 1)){
                for (int n = 2 ; n<= 11; n=n+i){  
                      digitalWrite(n, HIGH);   }
                delay(a);    // wait for a variable a
                for (int n = 2 ; n<= 11; n=n+i){  
                      digitalWrite(n, LOW);    }
                delay(b);   // wait for a variable b
    }
   
}
