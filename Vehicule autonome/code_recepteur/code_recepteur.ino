#include <VirtualWire.h>

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  vw_setup(1900); //initialisation de la bibliothèque VirtualWire à 2000 bauds
  vw_set_rx_pin(8);
  vw_rx_start();
  
}

  int numero_msg = 0;
  int nbr_good = 0;
  int nbr_bad = 0;

void decrypt(char * buf){
  int inByte = 0;
  int i;
  for (i = 0; i < strlen(buf); i++)
  {
   inByte = buf[i];        

   // A to M get converted to N to Z

   if (inByte >= 'A' && inByte <= 'M')

      {

        inByte += 13;
  
        } /* if upper case A-M */
  
     // N to Z get converted to A to M
  
    else if (inByte >= 'N' && inByte <= 'Z')
  
        {
  
        inByte -= 13;
  
        } /* if upper case N-Z */
  
     // Lower case a to m get converted to n to z
  
    else if (inByte >= 'a' && inByte <= 'm')
      {
  
        inByte += 13;
  
        } /* if lower case a-m */
  
     // Lower case n to z get converted to a to m
  
     else if (inByte >= 'n' && inByte <= 'z')
  
        {
  
        inByte -= 13;
  
        } /* if lower case n-z */
  
        buf[i] = inByte;
  }
}
  
void loop() {
  // put your main code here, to run repeatedly:
  /*uint8_t buf[VW_MAX_MESSAGE_LEN];
  uint8_t buflen = VW_MAX_MESSAGE_LEN;*/
  /*uint8_t paquet[32];
  uint8_t taille_paquet = 32;*/
  /*
  vw_have_message();
  
  if (vw_get_message(buf, &buflen)) {
    if (buf[0] == 'Y')//buf[0] != 'F' && buf[0] != 'D')
    {
      decrypt(buf);
      Serial.println("décrypté");
    }
    Serial.println((char *) buf);
    numero_msg++;
    Serial.println(numero_msg);
  }
  
  if (!vw_wait_rx_max(2500)) {
    Serial.println("Pas de message  reçu.");
    numero_msg++;
    Serial.println(numero_msg);
  }

  vw_get_rx_bad();
  vw_get_rx_good();

  if (vw_get_rx_good()) {
    nbr_good++;
  }
  
  if (vw_get_rx_bad()) {
    nbr_bad ++;
  }

  bool boul = true;
  char * msg = "Fin de transmission      ";
  int j;
  for (j = 0; j < 25; j++)
  {
    if (msg[j] != buf[j])
    {
      boul = false;
    }
  }
  
  if (boul) {
    Serial.println("LA ON S'ARRETE");
    Serial.println(nbr_good);
    Serial.println(nbr_bad);
    while(true);
  }*/

  Serial.println("TEST TEST");
}
