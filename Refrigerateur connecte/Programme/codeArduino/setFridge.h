void callFridgeControl_ON(){
  digitalWrite(PIN_CONTROL,HIGH);
  Serial.println("FRIDGE ON\n");
}

void callFridgeControl_OFF(){
  digitalWrite(PIN_CONTROL,LOW);
  Serial.println("FRIDGE OFF\n");
}
