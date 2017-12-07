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

        <title>Order List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel ="stylesheet" type ="text/css" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
          // Popup window code
          function newPopup() {
          	popupWindow = window.open('orderForm.php','popUpWindow','height=500,width=400,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes').focus();
          }
        </script>
    </head>


    <body>

         <h1>
             <div class="header">
            </div>
         </h1>




            <div class="tableName">
                Inventory Order Form
            </div>



            <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="freezer.php">Freezer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="back.php">Rear</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="NA.php">Other</a>
                </li>
                <li></li>

            </ul>
       </nav>
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

           <?php
        function login($url,$data){
                $fp = fopen("cookie.txt", "w");
                fclose($fp);
                $login = curl_init();
                console.log(curl_setopt($login, CURLOPT_COOKIEJAR, "cookie.txt"));
                curl_setopt($login, CURLOPT_COOKIEFILE, "cookie.txt");
                curl_setopt($login, CURLOPT_TIMEOUT, 40000);
                curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($login, CURLOPT_URL, $url);
                curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
                curl_setopt($login, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($login, CURLOPT_POST, TRUE);
                curl_setopt($login, CURLOPT_POSTFIELDS, $data);
                ob_start();
                return curl_exec ($login);
                ob_end_clean();
                curl_close ($login);
                unset($login);
            }

                login("https://www.lceforum.com/lceforum/login.aspx?ReturnUrl=%2flceforum%2f","");

                $myfile = fopen("cookie.txt","r");


                $tokenarray = file("cookie.txt");

                $myArray = $tokenarray[6];
                $myArray = substr($myArray, 84);
?>




       <?php
/*
       echo "<form target='Ordering' method='POST' action='https://www.lceforum.com/lceforum/login.aspx?ReturnUrl=%2flceforum%2f'>

            <input name='ScriptManager_TSM' type='hidden' value=';;System.Web.Extensions, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35:en:93a6b8ed-f453-4cc5-9080-8017894b33b0:ea597d4b:b25378d2'>

            <input name='__EVENTTARGET' type='hidden' value='' placeholder='EventTarget'>

            <input name='__EVENTARGUMENT' type='hidden' value='' placeholder='EventArgument'>

            <input name='__VIEWSTATE' type='hidden' value='/wEPDwUJNTQyMDU2MDYzZGREYWy6ICepT7SxBQfvX2Qzb1Bsng=='>

            <input name='__VIEWSTATEGENERATOR' type='hidden' value='6DE7526C'>

            <input name='dnn\$ctr14813\$View\$txtUsername' type='hidden' id='dnn_ctr14813_View_txtUsername' value='30640000'>

            <input name='dnn\$ctr14813\$View\$txtPassword' type='hidden' id='dnn_ctr14813_View_txtPassword' value='manaka'>

            <input name='ScrollTop' type='hidden' value='' placeholder='ScrollTop'>

            <input name='__dnnVariable' type='hidden' id='__dnnVariable' autocomplete='off' value='`{`__scdoff`:`1`,`sf_siteRoot`:`/lceforum/`,`sf_tabId`:`1123`}'>
            <input name='__RequestVerificationToken' type='hidden' placeholder='Request Token' value='$myArray'>

            <input name='dnn\$ctr14813\$View\$btnLogin' type='submit' id='dnn_ctr14813_View_btnLogin' value='Login' class='loginbtn'>LCEForum

        </form>";*/

?>

        <form target="_blank" method="POST" action="https://online.bldcorp.com/pnet/eOrder">

            <input name="SCRNFRME" type="hidden" value="_top">

            <input name="SCRNSRCE" type="hidden" value="SIGNON">

            <input name="SCRNDEST" type = "hidden" value="SIGNON">

            <input name= "SCRNCMD" type ="hidden" value="Signon">

            <input name ="ResetMessage" type ="hidden" value="true">

            <input name="UserAgent" type = "hidden" value="Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10.12%3B+rv%3A56.0%29+Gecko%2F20100101+Firefox%2F56.0">

            <input name="BrowserVersion" type="hidden"value="5.0+%28Macintosh%29">

            <input name="lang" type="hidden" value="">

            <input name="ScreenRes" type="hidden" value="800">

            <input name="UserName" type="hidden" value="30640000">

            <input name="Password"type="hidden" value="LCEBLD">

            <input name ="Submit" type="submit" value ="login" onclick="newPopup();">Blue Line
        </form>


            <br>
           <!-- <a href="autoOrder.php" class="btn btn-info btn-danger" role="button">Place Order</a> -->
<!--
                <object name="Ordering" type="text/html" >
                </object>

-->



    </body>


</html>
