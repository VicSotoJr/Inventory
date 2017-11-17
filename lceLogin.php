<html>
    <head>
        <title>LCE Login</title>
    </head>
    <body>

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
                echo $myArray = substr($myArray, 84);
?>
        
        
        
        
       <?php 
   
       echo "<form target='_blank' method='POST' action='https://www.lceforum.com/lceforum/login.aspx?ReturnUrl=%2flceforum%2f'>
              
            <input name='ScriptManager_TSM' type='text' value=';;System.Web.Extensions, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35:en:93a6b8ed-f453-4cc5-9080-8017894b33b0:ea597d4b:b25378d2'>
            <br>
            <input name='__EVENTTARGET' type='text' value='' placeholder='EventTarget'>
            <br>
            <input name='__EVENTARGUMENT' type='text' value='' placeholder='EventArgument'>
            <br>
            <input name='__VIEWSTATE' type='text' value='/wEPDwUJNTQyMDU2MDYzZGREYWy6ICepT7SxBQfvX2Qzb1Bsng=='>
            <br>
            <input name='__VIEWSTATEGENERATOR' type='text' value='6DE7526C'>
            <br>
            <input name='dnn\$ctr14813\$View\$txtUsername' type='text' id='dnn_ctr14813_View_txtUsername' value='30640000'>
            <br>
            <input name='dnn\$ctr14813\$View\$txtPassword' type='password' id='dnn_ctr14813_View_txtPassword' value='manaka'>
            <br>
            <input name='ScrollTop' type='text' value='' placeholder='ScrollTop'>
            <br>
            <input name='__dnnVariable' type='hidden' id='__dnnVariable' autocomplete='off' value='`{`__scdoff`:`1`,`sf_siteRoot`:`/lceforum/`,`sf_tabId`:`1123`}'>DNN Variable is hidden here
            <br>
            <input name='__RequestVerificationToken' type='text' placeholder='Request Token' value='$myArray'>
            <br>
            <input name='dnn\$ctr14813\$View\$btnLogin' type='submit' id='dnn_ctr14813_View_btnLogin' value='Login' class='loginbtn'>

        </form>";
       
?>

        
        <form method="POST" action="https://online.bldcorp.com/pnet/eOrder">
   
            <input name="SCRNFRME" type="text" value="_top">
            <br>
            <input name="SCRNSRCE" type="text" value="SIGNON">
            <br>
            <input name="SCRNDEST" type = "text" value="SIGNON">
            <br>
            <input name= "SCRNCMD" type ="text" value="Signon">
            <br>
            <input name ="ResetMessage" type ="text" value="true">
            <br>
            <input name="UserAgent" type = "text" value="Mozilla%2F5.0+%28Macintosh%3B+Intel+Mac+OS+X+10.12%3B+rv%3A56.0%29+Gecko%2F20100101+Firefox%2F56.0">
            <br>
            <input name="BrowserVersion" type="text"value="5.0+%28Macintosh%29">
            <br>
            <input name="lang" type="text" value="">
            <br>
            <input name="ScreenRes" type="text" value="800">
            <br>
            <input name="UserName" type="text" value="30640000">
            <br>
            <input name="Password"type="text" value="LCEBLD">
            <br>
            <input name ="Submit" type="submit" value ="login">
        </form>
        
        
    </body>
</html>
