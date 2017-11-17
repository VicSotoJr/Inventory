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
                Pepsi Order Form
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

                <li></li>
            </ul>
         <?php
                $update = "UPDATE `soda` SET `orderAmount`=`maxQuantity`-`quantity`";
                $updateResult = mysqli_query($conn, $update);
                $query = "SELECT sodaID,sodaName,size,price,orderAmount FROM soda Where orderAmount > 0";
                $result = mysqli_query($conn,$query);


                echo "<table class='table table-hover table-striped table-responsive'>";

                echo "<tr>
                      <th>SodaID</th>
                      <th>SodaName</th>
                      <th>Size</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      </tr>";

                while($row = mysqli_fetch_array($result)){
                    $sodaId = $row['sodaID'];
                    echo "<tr><td>" . $row['sodaID'] . "</td><td>" . $row['sodaName'] . "</td><td>".$row['size']."</td><td>" . $row['price'] . "<td>" . $row['orderAmount'] . "</td>"."</tr>";
                }

                echo "</table>";
                $total = "SELECT Round(sum(price * orderAmount),2)as total FROM soda WHERE orderAmount>0";
                $totalResult = mysqli_query($conn, $total);
                $row = mysqli_fetch_assoc($totalResult);

                echo "Estimated Order Total: <br>$";
                echo "$row[total]";




         ?>

    </body>


</html>
