 //From Arduino to Processing to Txt or cvs etc.
//import
import processing.serial.*;
//declare
PrintWriter output;
Serial udSerial;
long time;

void setup() {
  size(500,500);
  time = millis();
  udSerial = new Serial(this, Serial.list()[0], 9600);
  output = createWriter ("Battements.csv");
  }

  void draw() {
     while((millis()-time)<60000){ //lance la boucle pendant 60 secondes
      if (udSerial.available() > 0) {
         String SenVal = udSerial.readString();
        if (SenVal != null) {
          output.print(SenVal);
        }
      }
    }
    background(255,0,0);
  }
  void keyPressed(){
    output.flush();
    output.close();
    exit(); 
  }
