void setup() {
  // initialize digital pin LED_BUILTIN as an output.
  for (int n = 2 ; n<= 11; n++)
  {
     pinMode(n, OUTPUT);
  }
}

// the loop function runs over and over again forever
void loop() {
  for (int n = 2; n<=11 ;n++)   // turn the LED on (HIGH is the voltage level)
  {
    digitalWrite(n,HIGH);
    delay(50);                       // wait for a second
    digitalWrite(n, LOW);
    delay(10);// turn the LED off by making the voltage LOW
  }
}

