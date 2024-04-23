<?php
session_start();
// Elimina le variabili di sessione impostate
$_SESSION = array();
// Elimina la sessione
session_destroy();

header("Location: index.php");

?>