<?php
	// Conexion local a la base de datos
	// $dbhost = 'localhost';
	// $dbusername = 'root';
	// $dbuserpass = 'root';
	// $dbname = 'sportDataBase';

	$dbhost = 'db4free.net';
	$dbusername = 'rootuserjp';
	$dbuserpass = 'rootpass';
	$dbname = 'sportdatabase';

	$db = new PDO("mysql:dbname={$dbname};host={$dbhost};port=3306","$dbusername","$dbuserpass");

?>