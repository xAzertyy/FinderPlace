<?php
require_once("com.php");
        $conn = getdb();
        $query = "SELECT * FROM locations";
        $result = mysqli_query($conn, $query);
        
        $row = $result->fetch_all();
        
        $json_data = json_encode($row, JSON_PRETTY_PRINT);

        // Stampare o fare qualsiasi altra operazione con $json_data
        echo $json_data;


        
        
        ?>