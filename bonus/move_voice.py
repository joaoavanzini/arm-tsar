import speech_recognition as sr
from gtts import gTTS
from playsound import playsound
import serial, time
import re

def function_talk(audio):
    tts = gTTS(audio, lang='pt-br')
    tts.save('moviment.mp3')
    playsound('moviment.mp3')

    
def verify_voice():
    arduino = serial.Serial('/dev/ttyACM0', 9600, timeout=1)
    microfone = sr.Recognizer()
    with sr.Microphone() as source:
        microfone.adjust_for_ambient_noise(source)
        print("Por favor, diga algo!")
        audio = microfone.listen(source)
        
    try: 
        frase = microfone.recognize_google(audio, language='pt-br')
        ParsedFrase = frase.split(' ')
        print("Você falou: " + frase)
        if (ParsedFrase[0].lower() == "elevador"):
            angulo = frase.lower()[1] 
            arduino.write(b'w-' + angulo.encode())
            function_talk("Elevador em " + ParsedFrase[1].lower() + " graus")
            arduino.close()
        elif(ParsedFrase[0].lower() == "abrir") and (ParsedFrase[1].lower() == "garra"):
            arduino.write(b'e-120')
            function_talk("Garra aberta!")
            arduino.close()
        elif(ParsedFrase[0].lower() == "fechar") and (ParsedFrase[1].lower() == "garra"):
            arduino.write(b'e-10')
            function_talk("Garra fechada!")
            arduino.close()   
        elif (ParsedFrase[0].lower() == "atacante"):
            angulo = frase.lower()[1] 
            arduino.write(b'q-' + angulo.encode())
            function_talk("Atacante em " + ParsedFrase[1].lower() + " graus")
            arduino.close() 
        elif (ParsedFrase[0].lower() == "corpo"):
            angulo = frase.lower()[1] 
            arduino.write(b'r-' + angulo.encode())
            function_talk("corpo em " + ParsedFrase[1].lower() + " graus")
            arduino.close()         
    except sr.UnknownValueError:
        print("Desculpe, eu não entendi o que você disse!")
    
    return frase

frase = verify_voice()