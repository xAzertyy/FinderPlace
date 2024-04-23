<?php
require_once 'config.php';
session_start();

?>

<?php

$username = ($_POST["username"]);
$password = $_POST["password"];

// Protezione per SQL Injection
$username = stripcslashes($username);
$password = stripcslashes($password);

$conn = getdb();
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

$query = "SELECT * FROM login WHERE username = '$username'";

$result= $conn->query($query);
$row = $result->fetch_assoc();
$passDB = $row['password'];

if($passDB == $password){
	session_start();
	
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
}

echo $row['username'];
echo $row['password'];
echo $password;
echo $passDB;

if(isset($_SESSION['password']))
	

	
	if($passDB == $password){
		
		header("Location: index.php");
	}
	
	echo "Identificazione non riuscita: email o password errate<br>";
	echo "Torna alla pagina di <a href=\"login.php\">Login</a>";

?>