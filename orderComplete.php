<?php

session_start();
require 'dbConnect.php';

?>
<!DOCTYPE html>
<html lang = "en">
    <head>

        <title>Inventory List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
          <div class="header">
              <a href="index.php"> Inventory</a>
          </div>

          <h1> Order Complete!</h1>
          <h2>
          <a href="index.php">Return Home</a>
          </h2>

     </body>
</html>
