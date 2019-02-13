void setup() {
  // initialize digital pin LED_BUILTIN as an output.
  for (int n = 2 ; n<= 11; n++)
  {
     pinMode(n, OUTPUT);
  }
}

// the loop function runs over and over again forever
void loop() {
    // turn the LED on (HIGH is the voltage level)
  for (int n = 2 ; n<= 11; n++)
  {
     digitalWrite(n, HIGH);
  }
  delay(1000);                       // wait for a second
   for (int n = 2 ; n<= 11; n++)
  {
     digitalWrite(n, LOW);
  }
  
  delay(1000);                       // wait for a second
}
