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

        <title>Inventory List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    </script>
    <body>

         <h1>
             <div class="header">
            </div>
         </h1>

            <div class="tableName">
                2 Liter
            </div>
            <div class="topcorner"><a href="logout.php">Logout</a></div>
            <ul>
                <li class="nav-item">
                    <a href="/inventory">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li>

                    <a href="pepsi.php">2 Liter</a>

                </li>
                <li>
                    <a href="pepsi_OZ.php"> 20 Oz.</a>
                </li>
                <li>
                    <a href="POrder.php">Create Order</a>
                </li>
            </ul>
         <?php

                $query = "SELECT sodaID,sodaName,size,price,quantity FROM soda WHERE size='2 Liter'";
                $result = mysqli_query($conn,$query);


                echo "<table class='table table-hover table-striped table-responsive'>";

                echo "<tr>
                      <th>SodaID</th>
                      <th>SodaName</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Update Quantity</th>
                      </tr>";

                while($row = mysqli_fetch_array($result)){
                    $sodaId = $row['sodaID'];
                    echo "<tr><td>" . $row['sodaID'] . "</td><td>" . $row['sodaName'] . "</td><td>" . $row['price'] . "<td>" . $row['quantity'] . "</td>"."<td>"
                            ."<form action='pepsi.php' method='post' onsubmit='parent.window.location.reload(false)'>"."<input type='text' name='quantity' value='$quantity'>"
                            ."<input type='hidden' name='sodaId' value='$sodaId'>"
                            ."<td><input type='submit' name ='qSubmit' value = 'Submit'></td>"."</form>"."</td>"."</tr>";
                }

                echo "</table>";

                if(!empty($_POST['quantity']))
                {
                    $quantity = $_POST['quantity'];
                    $sodaId = $_POST['sodaId'];
                    $id=$_POST['id'];
                    $sql = "update soda set quantity= '$quantity' where sodaID= '$sodaId'";

                    if (mysqli_query($conn, $sql)) {
                         echo "Updated!";
                         echo $sodaId, $quantity;

                    } else {
                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                        header("Location:pepsi.php");

                }


         ?>

    </body>


</html>
