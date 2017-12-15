<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
    require 'dbConnect.php';
//This file is to create the table for the popup of the orderform in IORDER.php
?>
<!DOCTYPE html>

<html lang = "en">
    <head>

        <title>Order List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<body>


<?php
       $update = "UPDATE `items` SET `orderAmount`=`maxQuantity`-`quantity`";
       $updateResult = mysqli_query($conn, $update);
       $query = "SELECT itemID,itemName,price,orderAmount FROM items Where orderAmount > 0";
       $result = mysqli_query($conn,$query);


       echo "<table class='table table-hover table-striped table-responsive'>";

       echo "<tr>
             <th>ItemID</th>
             <th>ItemName</th>
             <th>Price</th>
             <th>Order Amount</th>
             </tr>";

       while($row = mysqli_fetch_array($result)){
           $itemId = $row['itemID'];
           echo "<tr><td>" . $row['itemID'] . "</td><td>" . $row['itemName'] . "</td><td>" . $row['price'] . "<td>" . $row['orderAmount'] . "</td>"."</tr>";
       }

       echo "</table>";
       $total = "SELECT Round(sum(price * orderAmount),2)as total FROM items WHERE orderAmount>0";
       $totalResult = mysqli_query($conn, $total);
       $row = mysqli_fetch_assoc($totalResult);

       echo "Estimated Order Total: <br>$";
       echo "$row[total]";




?>
</body>
</html>
