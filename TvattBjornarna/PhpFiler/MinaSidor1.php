<?php
//Session cookie så att bara användare kan gå in på denna sidan

define('CSS_PATH', 'template/css/'); //define CSS path 
define('JS_PATH', 'template/js/'); //define JavaScript path
// Undviker javascript XSS attacker
ini_set('session.cookie_httponly', 1);
// Session ID kan inte skickas genom URLs
ini_set('session.use_only_cookies', 1);
//Använda säker connection
ini_set('session.cookie_secure', 1);
session_start();
if (session_id() == '' || !isset($_SESSION["Namn"])) 
{
    header('Location:Notauthorized.html'); //Om inte användaren är inloggad kommer man till denna sidan
}
?>
  <html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSSFiler/cssFelanmalan.css">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">

<!--menyn-->
                <ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
                <li><a class="active" href="startsidalogin.php"><img src="../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                <li style="float: right; position: arelative;"><a href="LogOutPHP.php">LOGGA UT</a></li>
                <li style="float: right; position: arelative;"><a href="bokaLokal.php">BOKA LOKAL</a></li>
                <li style="float: right; position: arelative;"><a href="BokaBiltvatt.php">BOKA BILTVÄTT</a></li>
                <li style="float: right; position: arelative;"><a href="BokaTvattid.php">BOKA TVÄTTID</a></li>
                <li style="float: right; position: arelative;"><a href="Felanmalan.php">FELANMÄLAN</a></li>
              
        </ul>
        </head>
        <body>
        <div style="margin-left: 150px; margin-right: 150px;" class="bakgrund">
        <br><br> 
    
        <!--form 1, SE TVÄTTIDER -->
        <div id="element1">
        <br><h3>BOKADE TVÄTTIDER</h3>
        </div>
        <form action='MinaSidorTvatt.php' method="POST">
        <div id="element2" style="width:100%;">
        <input type="text" style="position:relative; width:60%;" value=" Fyll i ID på den tiden du vill avboka " onfocus="if (this.value==' Fyll i ID på den tiden du vill avboka ') this.value='';" name="SearchUSER">
        <input type="submit"  style="position:relative; width:20%;" value="AVBOKA" name="Skicka">
        <?php include 'MinaSidorTvatt.php'; ?>
        </form></div>
        <!-- form 2, SE BILTVÄTTIDER -->
        <div id="element3">
        <br><h3>BOKADE BILTVÄTTIDER</h3>
        </div>
        <form action='MinaSidorBiltvatt.php' method="POST">
        <div id="element4" style="width:100%;">
        <input type="text" style="position:relative; width:60%;" value=" Fyll i ID på den tiden du vill avboka " onfocus="if (this.value==' Fyll i ID på den tiden du vill avboka ') this.value='';" name="SearchUSER2">
        <input type="submit"  style="position:relative; width:20%;" value="AVBOKA" name="SkickaBiltvatt">
        <?php include 'MinaSidorBiltvatt.php'; ?>
        </form></div>
        <!--form 3, SE LOKALTIDER-->
        <div id="element5">
        <br><h3>BOKADE LOKALTIDER</h3>
        </div>
        <form action ='MinaSidorLokal.php' method="POST">
        <div id="element6" style="width:100%;">
        <input type="text" style="position:relative; width:60%;" value=" Fyll i ID på den tiden du vill avboka " onfocus="if (this.value==' Fyll i ID på den tiden du vill avboka ') this.value='';" name="SearchUSER3">
        <input type="submit"  style="position:relative; width:20%;" value="AVBOKA" name="SkickaLokal">
        <?php include 'MinaSidorLokal.php'; ?>
        </form></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script> 
    //Javascript funktion för att dölja och visa tabellerna med deras tider.
    $(document).ready(function(){
    $("#element1").click(function(){
        $("#element2").slideToggle("slow");
    });
    });
    $(document).ready(function(){
    $("#element3").click(function(){
        $("#element4").slideToggle("slow");
    });
    });
    $(document).ready(function(){
    $("#element5").click(function(){
        $("#element6").slideToggle("slow");
    });
    });
    </script>
      
        <div class="footer2">
        <footer class="footer1" style="text-align: center;">
            <p>TVÄTTBJÖRNAR</p>
            <p>KONTAKT: MAILADRESS@MAIL.SE </p>
            <p>TELEFON: 031-4151414</p>
            <a href="adminSidor/adminInlogg.php" >Admin inlogg:<br><img src="../Bilder/adminBild.png"></a>
        </footer>
        </div>

</body>
</html>