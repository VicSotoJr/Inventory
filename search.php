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

        <title>Search Items</title>
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
                <br>
            <form action="search.php" method="POST">
                    <input type="text" placeholder="Enter ItemID" name="ItemID" autofocus>
                    <input type ="submit" value="Enter">
            </form>
            </div>

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
                         Barcode Scanner
                        </a>

                        <div class="dropdown-menu">
                         <a class="dropdown-item" href="search.php">Search</a>
                         <a class="dropdown-item" href="removeItem.php">Remove inventory</a>
                        </div>
               </li>

               <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Manage Inventory
                       </a>

                       <div class="dropdown-menu">
                        <a class="dropdown-item" href="addItem.php">Add new item</a>
                        <a class="dropdown-item" href="deleteItem.php">delete item</a>
                       </div>
              </li>
                <li>
                     <a href="logout.php" class="btn btn-info btn-lg btn-danger">
                         <span class="glyphicon glyphicon-log-out"></span> Log out
                     </a>
                </li>
            </ul>
      </nav>

<div id="txtHint"><b>Search Result</b></div>

<?php

$q = $_POST["ItemID"];



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
                      <th>Update Quantity</th>
                      <th></th>
                      <th>Barcodes</th>
                      </tr>";

                while($row = mysqli_fetch_array($result)){
                    $ID = $row['ID'];
                    $item = $row['itemID'];
                    echo "<tr><td>" . $row['itemID'] . "</td><td>" . $row['itemName'] . "</td><td>" . $row['pack'] . "</td>"
                            . "<td>" . $row['size'] . "</td><td>" . $row['price'] . "</td><td>" . $row['quantity'] . "</td>"."<td>"
                            ."<form action='search.php' method='post' onsubmit='parent.window.location.reload(true)'>"
                            ."<input type='text' name='quantity' value='$quantity'>"
                            ."<input type='hidden' name='ID' value='$ID'>"
                            ."<td><input type='submit' name ='qSubmit' value = 'Submit'></td>"
                            ."</form>"."</td>"
                            ."<form method='post' action='barcode.php'>"
                            ."<td><input type='submit' name ='generate' value ='$item'></td>"
                            ."</form>"."</td>"
                            ."</tr>";
                }

                echo "</table>";

                 if(!empty($_POST['quantity']))
                {
                    $quantity = $_POST['quantity'];
                    $ID = $_POST['ID'];
                    $id=$_POST['id'];
                    $sql = "update items set quantity= '$quantity' where ID= '$ID'";

                    if (mysqli_query($conn, $sql)) {
                         echo "Updated!";
                         echo $ID," ", $quantity;

                    } else {
                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                         header("Location:search.php");



                }


?>


</body>
</html>
