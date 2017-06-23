<?php


	$host = 'localhost';
	$pass = 'root';
	$database = 'do';
	$user = "root";
	$port = 3306;

	$dbb = new mysqli($host, $user, $pass , $database, $port);

	if ($dbb->connect_error) { echo"Erreur dbb"; exit(); }

	$dbb->set_charset("utf8");




?>
