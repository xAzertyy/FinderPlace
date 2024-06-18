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
$password = md5($password);
$query = "SELECT * FROM login WHERE username = ? and password = ?";
$stmt = $conn->prepare($query);

$stmt->bind_param("ss", $username, $password);


if ($stmt->execute()) {
	$result = $stmt->get_result();
	$row = $result->fetch_array(MYSQLI_ASSOC);



	
	if ($row) {
		echo "User found on the database!";
		$userDB = $row['username'];
		$passDB = $row['password'];

		$_SESSION['username'] = $userDB;
		$_SESSION['password'] = $passDB;
		echo "<br>passInserita è " . $password;
		echo "<br>passdb è  " . $passDB;
		header("Location: index.php");
	} else {
		echo "Identificazione non riuscita: email o password errate<br>";
		echo "Torna alla pagina di <a href=\"login.php\">Login</a>";
	}
} else {
	echo "Failed to execute query: " . $conn->error;
}





?>