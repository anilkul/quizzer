<?php
	//Connect to MySQL
	$db_host = 'localhost';
	$db_name = 'quizzer';
	$db_user = 'root';
	$db_pass = 'root';
	
	//Create mysqli object
	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	//Error Hnadler
	if($mysqli->connect_error) {
		echo "Connect failed: " . $mysqli->connect_error;
		exit();
	}
	
?>