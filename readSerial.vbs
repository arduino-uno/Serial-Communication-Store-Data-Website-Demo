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