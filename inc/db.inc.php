<?php

	$conn = mysqli_connect("localhost", "root", "", "photogallery");
	global $conn;
/* check connection
	if (!$conn) {
		echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
		echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	echo "Erfolg: es wurde ordnungsgemäß mit MySQL verbunden! Die Datenbank \"datenbank\" ist toll." . PHP_EOL;
	echo "Host-Informationen: " . mysqli_get_host_info($conn) . PHP_EOL;
*/
?>