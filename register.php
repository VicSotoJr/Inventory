<?php
    session_start();
    
if(isset($_SESSION['user'])){
    header("Location: index.php");
}

require 'dbConnect.php';

if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])):
   

if($_POST['password'] != $_POST['confirm_password'])
{
    echo "Passwords do not match!";
}else{
//enter new user into database
    $username = $_POST['username'];
    $password = PASSWORD_HASH($_POST['password'],PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(user, password) VALUES ('$username','$password')";
  
    
    
if (mysqli_query($conn, $sql)) {
    echo "New user created successfully";
   
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    mysqli_close($conn);
}
     header("Location:login.php");

endif;



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
        <div class="header">
            </div>
        <div class="topcornerleft"><a href="index.php">Home</a></div>
        <h1> Register</h1>
        
        <span> or <a href="login.php">Log in here</a></span>
        
        <form action ="register.php" method = "POST">
            <input type ="text" placeholder ="Enter Username" name ="username" autofocus>
             <input type ="password" placeholder ="Enter Password" name ="password">
             <input type ="password" placeholder="Confirm Password"name="confirm_password">
             <input type ="submit"value="Register">
             
         </form>
    </body>
    
    
</html>