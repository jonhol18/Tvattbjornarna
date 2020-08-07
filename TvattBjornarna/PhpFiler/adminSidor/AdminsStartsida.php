<?php

define('CSS_PATH', 'template/css/'); //define CSS path 
define('JS_PATH', 'template/js/'); //define JavaScript path
// Undviker javascript XSS attacker
ini_set('session.cookie_httponly', 1);
// Session ID kan inte skickas genom URLs
ini_set('session.use_only_cookies', 1);
//Använda säker connection
ini_set('session.cookie_secure', 1);
session_start();
if (session_id() == '' || !isset($_SESSION["AdminNamn"])) 
{
    header('Location:Notauthorized.html');
}?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../CSSFiler/StartsidaCSS.css">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">
    </head>

<!--Använt samma mall som startsidan på webbplatsen har-->
    <body>
        <ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
        <li><a class="active" href="AdminsStartsida.php"><img src="../../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
        <li style="float: right; position: arelative;"><a href="../LogOutPHP.php">LOGGA UT</a></li>
        </ul>
        <div style="margin-left: 150px; margin-right: 150px;" class="bakgrund">
        <br><br> 
             <form action="AdminSeTider.php">
            <button href="AdminSeTider.php" class="button" style="vertical-align:middle; margin-top: 5px;"><span>Se bokade tider </span></button><br><br>
            </form>
            <form action="AdminFelanmalan.php">
            <button href="#home" class="button" style="vertical-align:middle; margin-top: 5px;"><span>Se felanmälan </span></button><br><br>
            </form>
            <form action="AdminAnvandarePHP.php">
            <button class="button" style="vertical-align:middle; margin-top: 5px;"><span>Hantera användare </span></button><br><br>
            </form>
            <form action="AdminOmradenPHP.php">
            <button href="AdminOmradenPHP.php" class="button" style="vertical-align:middle; margin-top: 5px;"><span>Hantera områden </span></button><br><br>
            </form>
 <div class="footer2">
                    <footer class="footer1" style="text-align: center;">
                                <p>TVÄTTBJÖRNAR</p>
                                <p>KONTAKT: MAILADRESS@MAIL.SE </p>
                                <p>TELEFON: 031-4151414</p>
                    </footer>
                </div>
            
    </body>
</html> 