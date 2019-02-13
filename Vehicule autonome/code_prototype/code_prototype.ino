#include <VirtualWire.h>
#include <Grove_I2C_Motor_Driver.h>

//---------------------------- Déclaration en lien avec les moteurs

#define I2C_ADDRESS 0x0f 

//---------------------------- Déclaration en lien avec l'infrarouge
int irPin = 2; //Pin du récepteur IR

//---------------------------- Déclarations en lien avec les capteurs de luminosité
int Capteur1 = 7;
int Capteur2 = 4;
int Capteur3 = 2;
int Capteur4 = 3;

//---------------------------- Etat capteur
bool etatCapteurGauche;
bool etatCapteurCentreGauche;
bool etatCapteurCentreDroit;
bool etatCapteurDroit;

//--------------------------- Pathfinding vars
int r, vectX, vectY, vectX2, vectY2, vectX3, vectY3, nowP, nextP, lastP;

// Tableau des coordonnées de chaque point
int coordTab[16][2] = {
  /* A */ {1, 5},
  /* B */ {0, 5},
  /* C */ {0, 4},
  /* D */ {1, 4},
  /* E */ {0, 2},
  /* F */ {0, 0},
  /* G */ {1, 0},
  /* H */ {1, 1},
  /* I */ {5, 1},
  /* J */ {5, 2},
  /* K */ {6, 0},
  /* L */ {6, 2},
  /* M */ {6, 5},
  /* N */ {5, 5},
  /* O */ {4, 5},
  /* P */ {4, 4}
  };

  // Tableau des points adjacents de chaque point (-1 = pas de point)
  int intersectTab[16][4] = {
  /* A */ {1, 3, 14, -1},
  /* B */ {2, 0, -1, -1},
  /* C */ {3, 4, 1, -1},
  /* D */ {0, 15, 2, -1},
  /* E */ {9, 5, 2, -1},
  /* F */ {6, 4, -1, -1},
  /* G */ {7, 10, 5, -1},
  /* H */ {8, 6, -1, -1},
  /* I */ {9, 7, -1, -1},
  /* J */ {4, 13, 11, 8},
  /* K */ {11, 6, -1, -1},
  /* L */ {9, 12, 10, -1},
  /* M */ {13, 11, -1, -1},
  /* N */ {9, 14, 12, -1},
  /* O */ {15, 0, 13, -1},
  /* P */ {3, 14, -1, -1}
  };
  
//--------------------------------------------- SETUP
void setupPath(int a, int b, int c)
{
  // La voiture part d'un point quelconque situé entre les points 'a' et 'b' (points consécutifs), dans le sens de a vers b
  // 'c' : le point d'arrivée
  
  // Ø -1
  // A 0
  // B 1
  // C 2
  // D 3
  // E 4
  // F 5
  // G 6
  // H 7
  // I 8
  // J 9
  // K 10
  // L 11
  // M 12
  // N 13
  // O 14
  // P 15
  
  vectX = coordTab[b][0] - coordTab[a][0];
  vectY = coordTab[b][1] - coordTab[a][1];
  nowP = b;
  nextP = -1;
  lastP = c;
}

void setup()
{
  //--------- Initialisation des paramètres d'envoi de trames
  vw_set_tx_pin(8);
  vw_setup(1900);
  
  transmission("Début de transmission    ");
  
  //--------- Initialisation des capteurs suiveur de ligne en INPUT  
  pinMode(Capteur1, INPUT); 
  pinMode(Capteur2, INPUT);
  pinMode(Capteur3, INPUT); 
  pinMode(Capteur4, INPUT);
 
  Motor.begin(I2C_ADDRESS);

  
  //--------- Initialisation de la communication série
  Serial.begin(112500);
  

  //--------- Initialisation des capteurs suiveur de ligne
  pinMode(Capteur1, INPUT);
  pinMode(Capteur2, INPUT);
  pinMode(Capteur3, INPUT);
  pinMode(Capteur4, INPUT);

  //--------- Initialisation du pathfinding
  setupPath(4, 9, 14);

  //--------- Delay de démarrage
  delay(2000);
}

//--------------------------------------------- FONCTIONS DE CONTRÔLES MOTEURS
void avancer()
{
  Motor.speed(MOTOR1, 60);
  Motor.speed(MOTOR2, -60);
}

void gauche()
{
  arreter();
  delay(200);
  avancer();
  delay(100);
  arreter();
  delay(150);
  Motor.speed(MOTOR1, -50);
  Motor.speed(MOTOR2, -50);
  delay(500);
  do {
    etatCapteurGauche = digitalRead(Capteur1);
    etatCapteurCentreGauche = digitalRead(Capteur2);
    etatCapteurCentreDroit = digitalRead(Capteur3);
    etatCapteurDroit = digitalRead(Capteur4);

    if (etatCapteurCentreGauche == HIGH && etatCapteurCentreDroit == HIGH && etatCapteurGauche == HIGH && etatCapteurDroit == HIGH) {
      etatCapteurCentreGauche = LOW;
    }
  } while(etatCapteurCentreGauche == LOW);
  //delay(585);
  arreter();
  delay(200);
}

void droite()
{
  arreter();
  delay(200);
  avancer();
  delay(100);
  arreter();
  delay(150);
  Motor.speed(MOTOR1, 50);
  Motor.speed(MOTOR2, 50);
  delay(450);
  do {
    etatCapteurGauche = digitalRead(Capteur1);
    etatCapteurCentreGauche = digitalRead(Capteur2);
    etatCapteurCentreDroit = digitalRead(Capteur3);
    etatCapteurDroit = digitalRead(Capteur4);

    if (etatCapteurCentreGauche == HIGH && etatCapteurCentreDroit == HIGH && etatCapteurGauche == HIGH && etatCapteurDroit == HIGH) {
      etatCapteurCentreDroit = LOW;
    }
  } while(etatCapteurCentreDroit == LOW);
  //delay(535);
  arreter();
  delay(200);
}

void reculer()
{
  Motor.speed(MOTOR1, -40);
  Motor.speed(MOTOR2, 40);
}

void arreter()
{
  Motor.stop(MOTOR1);
  Motor.stop(MOTOR2);
}

void pivoterGauche()
{
  Motor.speed(MOTOR1, 0);
  Motor.speed(MOTOR2, -100);
}

void pivoterDroite()
{
  Motor.speed(MOTOR1, 100);
  Motor.speed(MOTOR2, 0);
}

//--------------------------------------------- EMISSION ET CRYPTAGE DE MESSAGE
char* crypt(char* msg)
{
  int inByte = 0;
  int i;

  for (i = 0; i < strlen(msg); i++)
  {
    inByte = msg[i];

    if (inByte >= 'A' && inByte <= 'M' || inByte >= 'a' && inByte <= 'm')       // From A-m to N-z
    {
      inByte += 13;
    }
    else if (inByte >= 'N' && inByte <= 'Z' || inByte >= 'n' && inByte <= 'z')  // From N-z to A-m
    {
      inByte -= 13;
    }
    
    msg[i] = inByte;
  }
}

void transmission(char* msg)
{
  vw_send((uint8_t*) msg, strlen(msg)); // On envoie l'état de transmission
}

void message(char* msg)
{
  vw_send((uint8_t*) crypt(msg), strlen(msg)); // On envoie le message (crypté)
}

//--------------------------------------------- MODE D'ERRANCE SUIVANT LES LIGNES
void modeSuiveur()
{
  etatCapteurGauche = digitalRead(Capteur1);
  etatCapteurCentreGauche = digitalRead(Capteur2);
  etatCapteurCentreDroit = digitalRead(Capteur3);
  etatCapteurDroit = digitalRead(Capteur4);

  // Redressement à gauche (si le capteur central gauche détecte du NOIR)
  if ((etatCapteurCentreGauche == HIGH) && (etatCapteurGauche == LOW) && (etatCapteurDroit == LOW) && (etatCapteurCentreDroit == LOW))
  {
    pivoterGauche();
  }

  // Redressement à droite (si le capteur central droit détecte du NOIR)
  if ((etatCapteurCentreDroit == HIGH) && (etatCapteurGauche == LOW) && (etatCapteurDroit == LOW) && (etatCapteurCentreGauche == LOW))
  {
    pivoterDroite();
  }
  
  // Virage à gauche (si le capteur de gauche détecte du NOIR)
  if ((etatCapteurGauche == HIGH) && (etatCapteurDroit == LOW) && (etatCapteurCentreGauche == LOW) && (etatCapteurCentreDroit == LOW))
  {
    gauche();
    message("LTNTL Je tourne à gauche ");
  }

  // Virage à droite (si le capteur de droite détecte du NOIR)
  if ((etatCapteurDroit == HIGH) && (etatCapteurGauche == LOW) && (etatCapteurCentreGauche == LOW) && (etatCapteurCentreDroit == LOW))
  {
    droite();
    message("LTNTL Je tourne à droite ");
  }

  // Avancer droit (si les capteurs détectent tous du BLANC)
  if ((etatCapteurGauche == LOW) && (etatCapteurDroit == LOW) && (etatCapteurCentreGauche == LOW) && (etatCapteurCentreDroit == LOW))
  {
    avancer();
  }

  // S'arrêter (si les capteurs détectent tous du NOIR)
  if ((etatCapteurGauche == HIGH) && (etatCapteurDroit == HIGH) && (etatCapteurCentreGauche == HIGH) && (etatCapteurCentreDroit == HIGH))
  {
    arreter();
    message("LTNTL Je m'arrête        ");
  }
}

//--------------------------------------------- PATHFINDING
bool checkpath() // Retourne true si le robot passe sur une intersection ou un virage
{
  etatCapteurGauche = digitalRead(Capteur1);
  etatCapteurCentreGauche = digitalRead(Capteur2);
  etatCapteurCentreDroit = digitalRead(Capteur3);
  etatCapteurDroit = digitalRead(Capteur4);

  // S'arrêter (si les capteurs détectent tous du NOIR)
  if ((etatCapteurGauche == HIGH) && (etatCapteurDroit == HIGH) && (etatCapteurCentreGauche == HIGH) && (etatCapteurCentreDroit == HIGH))
  {
    arreter();
    message("LTNTL Je m'arrete            ");
    return false;
  }

  // Le robot passe sur une intersection ou un virage (si les capteurs latéraux détectent du NOIR)
  if ((etatCapteurGauche == HIGH) || (etatCapteurDroit == HIGH))
  {
    arreter();
    return true;  // Lance le pathfinding de point à point
  } else {  // Sinon suivi de ligne droite : redressements & avancée
    
    // Redressement à gauche (si le capteur central gauche détecte du NOIR)
    if ((etatCapteurCentreGauche == HIGH) && (etatCapteurGauche == LOW) && (etatCapteurDroit == LOW) && (etatCapteurCentreDroit == LOW))
    {
      pivoterGauche();
    }

    // Redressement à droite (si le capteur central droit détecte du NOIR)
    if ((etatCapteurCentreDroit == HIGH) && (etatCapteurGauche == LOW) && (etatCapteurDroit == LOW) && (etatCapteurCentreGauche == LOW))
    {
      pivoterDroite();
    }

    // Avancer droit (si les capteurs détectent tous du BLANC)
    if ((etatCapteurGauche == LOW) && (etatCapteurDroit == LOW) && (etatCapteurCentreGauche == LOW) && (etatCapteurCentreDroit == LOW))
    {
      avancer();
    }
    
    return false;
  }
}

void pathfind() // Gère les virages et le choix des destinations possibles dans une intersection
{
  // Arrivée à destination (si le robot est sur le point d'arrivée)
  if (nowP == lastP)
  {
    delay(200);
    arreter();
    message("LTNTL Je suis arrivé");
    transmission("EOT - Fin de transmission");
    while (true);  // On bloque le programme sur un arrêt du robot
  }

  // On choisit une direction aléatoire parmi les points adjacents
  // La sélection est refaite si on tombe sur le point d'où on vient ou un point inexistant
  do {
    randomSeed(analogRead(0));
    r = random(4);
    
    nextP = intersectTab[nowP][r];
    vectX2 = coordTab[nextP][0] - coordTab[nowP][0];
    vectY2 = coordTab[nextP][1] - coordTab[nowP][1];

    // On reboucle si le point sélectionné est celui d'où on vient
    if ((vectX < 0 && vectX2 > 0) || (vectX > 0 && vectX2 < 0) || (vectY < 0 && vectY2 > 0) || (vectY > 0 && vectY2 < 0))
    {
      nextP = -1;
    }
  } while (nextP < 0);

  if ((vectX < 0 && vectY2 < 0) || (vectY < 0 && vectX2 > 0) || (vectX > 0 && vectY2 > 0) || (vectY > 0 && vectX2 < 0))         // Virage à gauche (à l'aide des vecteurs)
  {
    arreter();
    message("LTNTL Je tourne a gauche ");
    arreter();
    gauche();
  } else if ((vectX < 0 && vectY2 > 0) || (vectY < 0 && vectX2 < 0) || (vectX > 0 && vectY2 < 0) || (vectY > 0 && vectX2 > 0))  // Virage à droite (à l'aide des vecteurs)
  {
    arreter();
    message("LTNTL Je tourne a droite ");
    arreter();
    droite();
  } else {                                                                                                                      // Tout droit dans une intersection (à l'aide des vecteurs)
    arreter();
    message("LTNTL J'avance           ");
    arreter();
    avancer();
  }
  
  vectX = vectX2;
  vectY = vectY2;
  nowP = nextP;
  nextP = -1;
}

//--------------------------------------------------------------------------------------------------------------------------------------- La BOUCLE
void loop()
{
  //modeSuiveur();

  // On effectue la vérification du chemin, le robot suit les lignes
  // Si le robot passe sur une intersection, on exécute le pathfinding point par point
  if (checkpath())
  {
    pathfind();
  }
}
