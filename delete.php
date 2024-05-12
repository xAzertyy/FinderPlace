<?php
session_start();
require_once("config.php");

$conn = getdb();

$query = "delete from locations where id_pos = ?";
$stmt = $conn->prepare($query);

$stmt->bind_param("i", $_GET['id']);
$stmt->execute();

 header("Location: tabeldb.php");

