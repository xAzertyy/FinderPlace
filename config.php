<?php
function getdb(){
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "my_finderplace";

	try {	   
		$conn = mysqli_connect($host, $username, $password, $db);
	}
	catch(exception $e)
	{
		echo "Impossibile connettersi al server! Errore: " . $e->getMessage();
	}
	return $conn;
}
