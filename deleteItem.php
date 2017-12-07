<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
    require 'dbConnect.php';
?>

<!DOCTYPE html>
<html lang = "en">
    <head>

        <title>Delete Item</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>

         <h1>
            <div class="header">

            </div>
         </h1>

            <div class="tableName">
                Delete Item
            </div>


            <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/index.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       LC Inventory
                     </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="freezer.php">Freezer</a>
                            <a class="dropdown-item" href="back.php">Rear</a>
                            <a class="dropdown-item" href="dough.php">Dough</a>
                            <a class="dropdown-item" href="cooler.php">Cooler</a>
                            <a class="dropdown-item" href="boxes.php">Boxes</a>
                            <a class="dropdown-item" href="front.php">Front</a>
                            <a class="dropdown-item" href="NA.php">Other</a>
                          </div>
                </li>

                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                         Drinks
                        </a>

                        <div class="dropdown-menu">
                         <a class="dropdown-item" href="pepsi.php">2 Liters</a>
                         <a class="dropdown-item" href="pepsi_OZ.php">20 oz.</a>
                        </div>
                </li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                         Scanner Functions
                        </a>

                        <div class="dropdown-menu">
                         <a class="dropdown-item" href="search.php">Search</a>
                         <a class="dropdown-item" href="addStock.php">Add Stock</a>
                         <a class="dropdown-item" href="removeItem.php">Remove Stock</a>
                        </div>
               </li>

               <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Manage Inventory
                       </a>

                       <div class="dropdown-menu">
                        <a class="dropdown-item" href="addItem.php">Add new item</a>
                        <a class="dropdown-item" href="deleteItem.php">Delete item</a>
                       </div>
              </li>
                <li>
                     <a href="logout.php" class="btn btn-info btn-lg btn-danger">
                         <span class="glyphicon glyphicon-log-out"></span> Log out
                     </a>
                </li>
            </ul>
      </nav>

            <form action="deleteItem.php" method="post">
                <input type="text" placeholder="Item Id" name ="itemId">

                <input type="submit" name="qSubmit" value="Submit">
            </form>

<?php

    if(!empty($_POST['itemId'])){
        $itemID = $_POST["itemId"];


    $sql="delete from items where `itemID` = '$itemID'";

    if (mysqli_query($conn, $sql)) {
        echo "Updated!";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
   ?>



    </body>


</html>
