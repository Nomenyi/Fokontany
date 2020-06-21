<?php
    $servername = "localhost";
    $username = "nomenyi";
    $password = "nomenyi";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=FOKONTANY", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "<h4 style='color: white;' >Connected successfully</h4>";
    }
    catch(PDOException $e){
        echo "<h4 style='color: white;' >Connection failed: " . $e->getMessage()."</h4>";
    }
?> 