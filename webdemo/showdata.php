<?php
error_reporting(0);

$connect = mysqli_connect("localhost", "root", "", "arduino");
 
if ( mysqli_connect_error() ) exit( "Failed to connect to MySQL: " . mysqli_connect_error() );

$sql = mysqli_query( $connect,"SELECT * FROM dht11 ORDER BY id DESC LIMIT 1" );

$result = array(); 
while ( $row = mysqli_fetch_array( $sql ) ) {
	array_push( $result, array( 'id' => $row[0], 
							'humi' => $row[2],
							'tempc' => $row[3],
							'tempf' => $row[4] 
						) );
}

echo json_encode( array( "result" => $result ) );