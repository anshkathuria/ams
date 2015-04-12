<?php
	define("HOST", "localhost"); 			
	define("USER", "root"); 			
	define("PASSWORD", "root"); 	
	define("DATABASE", "ams");         
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if ($mysqli->connect_error) {
		header("Location: ../index.php?err=Unable to connect to MySQL");
		exit();
	}