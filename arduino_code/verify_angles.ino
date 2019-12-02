#include <VarSpeedServo.h>
 
VarSpeedServo attack;
VarSpeedServo elevator; 
VarSpeedServo claw;
VarSpeedServo body;

int posicao = 90;
int posicao_attack = 90;
int posicao_elevator = 90;
int posicao_claw = 90;
int posicao_body = 90;

char mover;
 

void setup() {
    Serial.begin(9600);
    attack.attach(9, 1, 180);
    elevator.attach(10, 1, 180);
    claw.attach(11, 1, 180);
    body.attach(8, 1, 180);

}

void loop() {
 
  mover = Serial.read();
  
  if (mover == 'q'){
    posicao_attack += 1;
    attack.write(posicao_attack);
    Serial.println("movendo o objeto attack para o ângulo: ");
    Serial.println(int(posicao_attack));
    mover = 'z';
  }
  else if (mover == 'a'){
    posicao_attack -= 1;
    attack.write(posicao_attack);
    Serial.println("movendo o objeto attack para o ângulo: ");
    Serial.println(int(posicao_attack));
    mover = 'z';
  }
  
   else if (mover == 'w'){
    posicao_elevator += 1;
    elevator.write(posicao_elevator);
    Serial.println("movendo o objeto elevator para o ângulo: ");
    Serial.println(int(posicao_elevator));
    mover = 'z';
  }
  else if (mover == 's'){
    posicao_elevator -= 1;
    elevator.write(posicao_elevator);
    Serial.println("movendo o objeto elevator para o ângulo: ");
    Serial.println(int(posicao_elevator));
    mover = 'z';
  }
  
  else if (mover == 'e'){
    posicao_claw += 1;
    claw.write(posicao_claw);
    Serial.println("movendo o objeto claw para o ângulo: ");
    Serial.println(int(posicao_claw));
    mover = 'z';
  }
  else if (mover == 'd'){
    posicao_claw -= 1;
    claw.write(posicao_claw);
    Serial.println("movendo o objeto claw para o ângulo: ");
    Serial.println(int(posicao_claw));
    mover = 'z';
  }

  else if (mover == 'r'){
    posicao_body += 1;
    body.write(posicao_body);
    Serial.println("movendo o objeto body para o ângulo: ");
    Serial.println(int(posicao_body));
    mover = 'z';
  }
  else if (mover == 'f'){
    posicao_body -= 1;
    body.write(posicao_body);
    Serial.println("movendo o objeto body para o ângulo: ");
    Serial.println(int(posicao_body));
    mover = 'z';
  }
  else if (mover == 'y'){
    posicao == 90;
    attack.write(posicao);
    elevator.write(posicao);
    body.write(posicao);
    claw.write(posicao);
    Serial.println("movendo todos os objetos para o ângulo inicial: ");
    Serial.println(int(posicao));
    mover = 'z';
  }
  
}