import serial, time

with serial.Serial('/dev/ttyACM0', 9600, timeout=1) as s:
    s.write(b'e-10\r')
    time.sleep(10)
    s.write(b'e-120\r')
    t1 = time.time()
    reading = s.readall()
    t2 = time.time()
    print(t2 - t1)