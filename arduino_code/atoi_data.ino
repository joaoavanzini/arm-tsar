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

String _mover;
char mover;
char *_posicao;
 
void setup() {
    Serial.begin(9600);
    attack.attach(9, 1, 180);
    elevator.attach(10, 1, 180);
    claw.attach(11, 1, 180);
    body.attach(8, 1, 180);

}

void loop() {
  
 if (Serial.available()){
   _mover = Serial.readString();
   mover = _mover[0];
   _posicao = &_mover[2];
   //int posicao = _posicao.toInt();
   posicao_attack = posicao_elevator = posicao_claw = posicao_body = atoi(_posicao);
  }
  
  if (mover == 'q'){
    attack.write(posicao_attack);
    Serial.println("movendo o objeto attack para o ângulo: ");
    Serial.println(int(posicao_attack));
    mover = 'z';
  }
  
   else if (mover == 'w'){
    elevator.write(posicao_elevator);
    Serial.println("movendo o objeto elevator para o ângulo: ");
    Serial.println(int(posicao_elevator));
    mover = 'z';
  }
  
  else if (mover == 'e'){
    claw.write(posicao_claw);
    Serial.println("movendo o objeto claw para o ângulo: ");
    Serial.println(int(posicao_claw));
    mover = 'z';
  }

  else if (mover == 'r'){
    body.write(posicao_body);
    Serial.println("movendo o objeto body para o ângulo: ");
    Serial.println(int(posicao_body));
    mover = 'z';
  }  
}