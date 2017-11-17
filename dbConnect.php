<?php
$server = 'localhost';
$user = 'root';
$password = 'root';
$database = 'Inventory';
        
try{
    $conn = mysqli_connect($server, $user, $password, $database);
    
} catch (Exception $ex) {
    die("Connection Failed: " . $e->getMessage());
}


?>