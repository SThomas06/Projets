unsigned long time;
int valeurPrecedente = 0;
long tempsPrecedent = 0;

void setup() {

  Serial.begin(9600);

  Serial.println("Veuillez patienter");

  time = millis();

  // un petit réchauffement du convertisseur
  // analogique-numérique semble améliorer les résultats
  while((millis()-time)<1000){
    analogRead(A0);
  }

  time = millis();

  // on affiche au moniteur série pendant 50 secondes
  while((millis()-time)< 50000){
    Serial.println(analogRead(A0));
  }
}

void loop() {
 int valeurActuelle, valeurSeuil;
  long tempsDetection;

  valeurActuelle = analogRead(A5);
  Serial.println ( valeurActuelle);
  valeurSeuil = 650;
/*
  if (valeurActuelle > valeurSeuil) {  // on est dans la zone max
    if (valeurPrecedente <= valeurSeuil) {  // est-ce qu'on vient d'y entrer?
      tempsDetection = millis();
      if (tempsDetection > (tempsPrecedent + 200)){  // ce n'est pas seulement du bruit?
        Serial.println( (1000.0 * 60.0) / (tempsDetection - tempsPrecedent),0);
        tempsPrecedent = tempsDetection;
      }
    }
  }

  valeurPrecedente = valeurActuelle;
*/
}
