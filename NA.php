<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
    require 'dbconnect.php';
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
            
         <h1>
             <div class="header">
            </div>
         </h1>
            
            <div class="tableName">
                Not Applicable
            </div>
            <div class="topcorner"><a href="logout.php">Logout</a></div> 
             
            
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/inventory">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="freezer.php">Freezer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="back.php">Back</a>   
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dough.php">Dough</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cooler.php">Cooler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="boxes.php">Boxes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="front.php">Front</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="NA.php">Not Applicable</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="IOrder.php">Create Order</a>
                </li>
            </ul>
       </nav>
         <?php
        
                $query = "SELECT ID,itemID,itemName,pack,size,price,areaID,quantity FROM items where areaID = 'NA'"; 
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
                            ."<form action='NA.php' method='post' onsubmit='parent.window.location.reload(false)'>"
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
                         echo $ID, $quantity;
    
                    } else {
                         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } 
                    
                        header("Location:NA.php");
                       
                }

    
         ?>
        
    </body>
    
    
</html>