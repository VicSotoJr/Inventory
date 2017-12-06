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


        <?php if(isset($_SESSION['user']) ):?>

            <h1>
                <div class="header">
                </div>
            </h1>



      <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="index.php">
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
                        <a href="logout.php" class="btn btn-info btn-lg btn-danger">
                            <span class="glyphicon glyphicon-log-out"></span> Log out
                        </a>
                </li>
            </ul>
      </nav>

               <!--Left Side-->
               <div class="col-sm-6">
                       ---TODO
               </div>
               <!--Right Side-->


               <div class="col-sm-6" >
               <h3>Critical Items</h3>

               <?php



                     $query = "SELECT ID,itemID,itemName,areaID,quantity FROM items where quantity <1 and areaID in ('FR','F','BX','C','D','B')";
                     $result = mysqli_query($conn,$query);

                     echo "<table class='table table-hover table-striped table-responsive'>";

                     echo "<tr>
                            <th>ItemID</th>
                            <th>ItemName</th>
                            <th>Quantity</th>
                            <th>Barcodes</th>
                            </tr>";

                     while($row = mysqli_fetch_array($result)){
                          $ID = $row['ID'];
                          $item = $row['itemID'];
                          echo "<tr><td>" . $row['itemID'] . "</td><td>" . $row['itemName'] . "</td><td>" . $row['quantity'] . "</td>"
                                  ."<form method='post' action='barcode.php'>"
                                  ."<td><input type='submit' name ='generate' value ='$item'></td>"
                                  ."</form>"."</td>"
                                  ."</tr>";
                     }

                     echo "</table>";


               ?>

               </div>










        <?php else: ?>

            <div class="header">
                <a href="index.php"> Inventory</a>
            </div>

        <h1> Welcome to LC Inventory </h1>
        <h2>Login or Register</h2>
        <a href="login.php">Login</a> or
        <a href="register.php"> Register</a>

        <?php endif; ?>
    </body>
</html>
