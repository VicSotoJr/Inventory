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

        <title>Add Items</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
<body>

<!--Form in order to input itemID using the barcode scanner to increase the quantity of the item-->
            <div class="header">
                <br>
            <form action="addStock.php" method="POST">
                    <input type="text" placeholder="Enter ItemID" name="ItemID" autofocus>
                    <input type ="submit" value="Enter">
            </form>
            </div>

<!-- Nav Bar-->
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
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

<div id="txtHint"><b>Addition Result</b></div>

<?php

/* This PHP will update the necessary quantity to the item inputted
   then will display out in a table for the user to see*/

$q = $_POST["ItemID"];


 $sql = "update items set quantity= quantity+1 where itemID= '$q'";
                $result = mysqli_query($conn,$sql);
 $query = "SELECT ID,itemID,itemName,pack,size,price,areaID,quantity FROM items where itemID = '$q'";
                $result = mysqli_query($conn,$query);


                echo "<table class='table table-hover table-striped table-responsive'>";

                echo "<tr>
                      <th>ItemID</th>
                      <th>ItemName</th>
                      <th>Pack</th>
                      <th>Size</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Barcodes</th>
                      </tr>";

                while($row = mysqli_fetch_array($result)){
                    $ID = $row['ID'];
                    $item = $row['itemID'];
                    echo "<tr><td>" . $row['itemID'] . "</td><td>" . $row['itemName'] . "</td><td>" . $row['pack'] . "</td>"
                            . "<td>" . $row['size'] . "</td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td>"
                            ."<form method='post' action='barcode.php'>"
                            ."<td><input type='submit' name ='generate' value ='$item'></td>"
                            ."</form>"."</td>"
                            ."</tr>";
                }

                echo "</table>";

                $sql = "update items set quantity= quantity-1 where ID= '$ID'";
                if(!empty($_POST['itemID']))
                {
                    $quantity = $_POST['quantity'];
                    $ID = $_POST['ID'];
                    $id=$_POST['id'];
                    $sql = "update items set quantity= quantity+1 where ID= '$ID'";

                    if (mysqli_query($conn, $sql)) {
                         echo "Updated!";
                         echo $ID," ", $quantity;

                    } else {
                         console.log( mysqli_error($conn));
                    }
                         header("Location:addStock.php");



                }


?>


</body>
</html>
