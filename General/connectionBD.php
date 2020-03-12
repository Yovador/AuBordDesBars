<?php
	$ShowText = false;
	$user = 'root';
	$pass = '';	
	$host = "localhost";
	$dbname = 'blogart20';
	$port = '3308';

	try {
		$DB = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8", $user, $pass);
		$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($ShowText) {
			echo "<h2 style='color : green;'> CONNECTION ON </h2>";
			echo "<br> <br>";
		}

	}
	catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
	}

?>