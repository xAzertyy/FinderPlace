<?php
if (isset($_POST['tipo'])) {
    // You might want to validate or sanitize the input here
    echo htmlspecialchars($_POST['tipo']);
} else {
    echo 'No place selected.';
}
?>
