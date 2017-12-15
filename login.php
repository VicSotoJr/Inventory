<?php
ob_start();
session_start();

if(isset($_SESSION['user'])){
    header("Location: index.php");
}

/*This finds the requirements of login in the database and grants access to login*/
require 'dbConnect.php';
if(!empty($_POST['username']) && !empty($_POST['password'])):
    $username = $_POST['username'];
    $password = $_POST['password'];

    $records = mysqli_query($conn,"SELECT id,user,password FROM users WHERE user = '$username'");
    $row = mysqli_fetch_array($records);
    $count = mysqli_num_rows($records);

    $dbPass= password_verify($password,$row['password']);

    if($count ==1 && $dbPass==$password){
        $_SESSION['user']= $row['id'];
        header("Location:index.php");

    }
    if(count!=1)
    {
        echo "Incorrect username or password";
    }

endif;
?>


<!DOCTYPE html>
<html lang = "en">
    <head>
<!-- This is the login form and page -->
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>

    <body>
            <div class="header" >
            </div>
            <div class="topcornerleft"><a href="index.php">Home</a></div>

         <h1> Login</h1>

         <span> or <a href="register.php">Register here</a></span>

         <form action ="login.php" method = "POST">
             <input type ="text" placeholder ="Enter Username" name ="username" autofocus>
             <input type ="password" placeholder ="Enter Password" name ="password">
             <input type ="submit" value="Log in">

         </form>

    </body>


</html>
