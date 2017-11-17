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

        <title>Add Item</title>
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
                Add Item
            </div>


            <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/index.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="freezer.php">Inventory List</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="pepsi.php">Pepsi</a>
                </li>
                <li class="nav-item active">
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

            <form action="addItem.php" method="post">
                <input type="text" placeholder="Item Id" name ="itemId">
                <input type="text" placeholder="Item Name" name ="itemName">
                <input type="text" placeholder="Pack" name ="pack">
                <input type="text" placeholder="Size" name ="size">
                <input type="text" placeholder="Price" name ="price">
                <select  name="areaID">
                    <option>Select an Area</option>
                    <option value="B">Back</option>
                    <option value="BX">Boxes</option>
                    <option value="C">Cooler</option>
                    <option value="D">Dough</option>
                    <option value="F">Front</option>
                    <option value="FR">Freezer</option>
                    <option value="NA">Not Applicable</option>
                </select>
                <input type="text" placeholder="Max Quantity" name ="maxQuantity">

                <input type="submit" name="qSubmit" value="Submit">
            </form>

<?php

    if(!empty($_POST['itemId'])&&!empty($_POST['itemName'])&&!empty($_POST['pack'])&&!empty($_POST['size'])&&!empty($_POST['price'])&&!empty($_POST['areaID'])&&!empty($_POST['maxQuantity'])){
        $itemID = $_POST["itemId"];
        $itemName = $_POST["itemName"];
        $pack = $_POST["pack"];
        $size = $_POST["size"];
        $price=$_POST["price"];
        $areaID=$_POST["areaID"];
        $maxQuantity=$_POST["maxQuantity"];

    $sql="INSERT INTO items(`itemID`, `itemName`, `pack`, `size`, `price`, `areaID`, `maxQuantity`) VALUES ('$itemID','$itemName','$pack','$size','$price','$areaID','$maxQuantity')";

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
