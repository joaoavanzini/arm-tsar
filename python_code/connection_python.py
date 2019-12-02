import mysql.connector
from mysql.connector import Error
import serial, time

try:
    connection = mysql.connector.connect(host='143.106.241.3', database='cl17235', user='cl17235', password='cl*08102001')
    
    sql_select_Query = "select * from moves order by id desc limit 1"
    cursor = connection.cursor()
    cursor.execute(sql_select_Query)
    records = cursor.fetchall()
    
        
    print("Total number of rowns in moves is: ", cursor.rowcount)
    print("\nPrinting each moves record")
    for row in records:
        print("Id = ", row[0], )
        print("attack = ", row[1])
        print("elevator = ", row[2])
        print("claw = ", row[3])
        print("body = ", row[4], "\n")
        
        _row = 'q-' + row[1]
        __row = 'w-' + row[2]
        ____row = 'r-' + row[4]
        
        if(row[3] == "open"):
            _angle = '120'
        elif(row[3] == "close"):
            _angle = '65'            
        
        ___row = 'e-' + _angle
        

        with serial.Serial('/dev/ttyACM0', 9600, timeout=1) as s:
            
            t1 = time.time()
            time.sleep(2)
            s.write(_row.encode())
            print(_row.encode())
            time.sleep(2)
            
            s.write(__row.encode())
            print(__row.encode())
            time.sleep(2)
            
            s.write(___row.encode())
            print(___row.encode())
            time.sleep(2)
            
            s.write(____row.encode())
            print(____row.encode())
            time.sleep(2)

            __read = s.readall()
            t2 = time.time()
            print(t2 - t1)
            
                        
except Error as e:
    print("Error: ", e)
    
finally:
    
    if(connection.is_connected() or s.is_open()):
        connection.close()
        cursor.close()
        print("MySql closed!")
        s.close()
        print("Arduino closed!")