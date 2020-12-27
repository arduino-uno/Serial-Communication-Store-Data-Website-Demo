# Serial-Communication-Store-Data-Website-Demo

Communication with PC using VBS, save the Arduino Temperature Sensor data to MySQL for display on the website

## TODO List:
- [x] Create database & tabel in MySql
- [x] Run <strong>readSerial.vbs</strong> to store data from Arduino
- [x] Open HTML Page & jQuery + Ajax for retreive data from MySql in some period time

# Read & Store Data From Arduino UNO to MySql

For communication from Arduino UNO to PC i use VBS (Visual Basic Script)
This is Example Script to store data into MySQL:

```c
  ' The MySQL query
  Set objShell = CreateObject( "WScript.Shell" )
  ' Store Data to MySql, make sure the mysql path you are using is correct
  Return = objShell.Run( "C:\wamp64\bin\mysql\mysql8.0.21\bin\mysql -hlocalhost -uroot arduino -e " _
  & chr(34) & "INSERT INTO `dht11` (`humi`, `tempc`, `tempf`) VALUES ('1', '2', '3')", 1, false )

  wscript.Sleep 500
```

# readSerial.vbs

```c
on error resume next
Const ForReading = 1
Const ForWriting = 2

dim port, data
' get COM port number from the user
port = InputBox( "Enter COM Port Number (e.g: COM1, COM2, COM3)" )

Set wshell = CreateObject( "WScript.Shell" )
Set fso = CreateObject( "Scripting.FileSystemObject" )
Set com = fso.OpenTextFile( port & ":9600,N,8,1", ForReading )

MsgBox( "Start to read data from " & port )

Do While com.AtEndOfStream <> True
	' Humidity & Temperature Data 
	data = com.ReadLine
	' Store Data to MySql, make sure the mysql path you are using is correct
	Return = objShell.Run( "C:\wamp64\bin\mysql\mysql8.0.21\bin\mysql -hlocalhost -uroot arduino -e " _
							& chr(34) & "INSERT INTO `dht11` (`humi`, `tempc`, `tempf`) VALUES (" & data & ")" & chr(34), 1, false )
	WScript.Sleep( 200 )
Loop

objFile.Close
com.Close()
```
