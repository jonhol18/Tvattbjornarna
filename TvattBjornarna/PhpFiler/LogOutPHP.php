<?php
session_start(); //Startar session
session_destroy();//Förstör session 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSSFiler/Mall.css">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">
            <ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
                <li><a class="active" href="Startsida.php"><img src="../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                <li style="float: right; position: arelative;"><a href="LogInPHP.php">LOGGA IN</a></li>
        
        </ul>
    <div style="margin-left: 150px; margin-right: 150px;"class="bakgrund">
                <br><br>
            <h2  style="float:center; text-align:center; color:rgb(141, 157, 187); padding-right:30px;">Du är nu utloggad!</h2>
            <br><br>  
    </head>
<body>
<div class="footer2">
<footer class="footer1" style="text-align: center;">
        <p>TVÄTTBJÖRNAR</p>
        <p>KONTAKT: MAILADRESS@MAIL.SE </p>
        <p>TELEFON: 031-4151414</p>
        <a href="adminSidor/adminInlogg.php" >Admin inlogg:<br><img src="../Bilder/adminBild.png"></a>

</footer>
</div>
</div>
</body>
</html>
