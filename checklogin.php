<?php
require_once 'config.php';
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

// Protezione per SQL Injection
$username = stripcslashes($username);
$password = stripcslashes($password);

$conn = getdb();
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);
$query = "SELECT * FROM login WHERE username = ?";
$stmt = $conn->prepare($query);

$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {

        if (password_verify($password, $row["password"])) {

            // echo "Utente trovato!";
            $_SESSION['username'] = $row["username"];
            $_SESSION['password'] = $row["password"];
            header("Location: index.php");
            exit;
        }

    }

    $_SESSION['error'] = "<h3 style= text-align:center;>Identificazione non riuscita: email o password errate<h3>";
    header("Location: login.php");

} else {
    echo "Failed to execute query: " . $conn->error;
}
?>