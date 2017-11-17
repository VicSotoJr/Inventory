<?php

session_start();


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
         
        
        <?php if(isset($_SESSION['user']) ):?>
            <h1>
                <div class="header">
                </div>
            </h1>
            
        
       
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="/inventory">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="freezer.php">LC Inventory</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="pepsi.php">Pepsi Inventory</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="addItem.php">Add Item</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="search.php">Search</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="removeItem.php">Reduce Inventory</a>
                </li>
                <li>
                        <a class="nav-item" href="logout.php">Logout</a>
                </li>
            </ul>
      </nav>


                
           
            
        <?php else: ?>
         
            <div class="header">
                <a href="/inventory"> Inventory</a>
            </div>
           
        <h1> Welcome to LC Inventory </h1>
        <h2>Login or Register</h2>
        <a href="login.php">Login</a> or 
        <a href="register.php"> Register</a>
        
        <?php endif; ?>
    </body>
</html>