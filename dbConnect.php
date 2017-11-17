<?php

$server = 'us-cdbr-iron-east-05.cleardb.net';
$user = 'be579759e49bd1';
$password = 'a623f1e2';
$database = 'heroku_4dd8172fe7a14c4';

try{
    $conn = mysqli_connect($server, $username, $password, $db);

} catch (Exception $ex) {
    die("Connection Failed: " . $e->getMessage());
}


?>
