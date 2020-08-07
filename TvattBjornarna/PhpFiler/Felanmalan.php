<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../CSSFiler/FelDesign.css">
</head>
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
if (session_id() == '' || !isset($_SESSION["Namn"])) 
{
    header('Location:Notauthorized.html'); // om användare inte är inloggad tas den till denna sida
} 
?>
<form action="UploadTest.php" method="POST">    
<script>
    //En jquery funktion vid val av fel. Väljer användare t.ex biltvätt så kan de välja fel hos avlopp, saknat material, belysning och övrigt.
    jQuery(function($) {
        var Fel = {
        'Biltvätt': [' ','Avlopp', 'Saknat material', 'Belysning', 'Övrigt'],
        'Tvättstuga': [' ','Avlopp', 'Belysning', 'El', 'Maskinfel','Övrigt'],
        'Lokaler': [' ','Dörr', 'Belysning', 'El','Saknat material', 'Trasiga möbler', 'Övrigt'],
        'Lägenhet': [' ','Balkong', 'El', 'Fukt', 'Rör', 'Vatten', 'Reparation', 'Övrigt'],
        }
        var $Fel = $('#Fel');
        $('#Plats').change(function () {
            var Plats = $(this).val(), lcns = Fel[Plats] || [];
    
            var html = $.map(lcns, function(lcn){
                return '<option value="' + lcn + '">' + lcn + '</option>'
            }).join('');
            $Fel.html(html)
        });
    });
    </script>
    <!--html-->
    <body>
<div class="felAnmalan" style ="align-content: center;">
    <label for="adress">Adress</label>
    <input type="text" id="adress" name="adress" placeholder="Skriv här.." required>
    <label class="Plats1">Läge</label>
    <div class="Plats">
        <select id="Plats" name="Plats" required>
            <option></option>
            <option>Lägenhet</option>
            <option>Tvättstuga</option>
            <option>Lokaler</option>
            <option>Biltvätt</option>
    
        </select>
    </div>
    <label class="Fel1">Fel</label>
    <div class="Fel">
        <select id="Fel" name="Fel" required></select>
    </div>

    <label for="Beskrivning">Beskriv problemet så detaljerat som möjligt.</label>
    <textarea id="Beskrivning" name="Beskrivning" placeholder="Beskriv felet.." style="height:100px" required></textarea>

    <button id="ButtonSubmit" type="submit">Anmäl fel</button> <br> <br>
  </form>
</div>
<!--menyn-->
<ul class="meny" style="margin-left: 150px; margin-right: 150px; ">
                <li><a class="active" href="startsidalogin.php"><img src="../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                <li style="float: right; position: relative;"><a href="LogOutPHP.php">LOGGA UT</a></li>
                <li style="float: right; position: relative;"><a href="Felanmalan.php">FELANMÄLAN</a></li>
                <li style="float: right; position: relative;"><a href="BokaTvattid.php">BOKA TVÄTTID</a></li>
                <li style="float: right; position: relative;"><a href="BokaBiltvatt.php">BOKA BILTVÄTT</a></li>
                <li style="float: right; position: relative;"><a href="bokaLokal.php">BOKA LOKAL</a></li>
        </ul>
        <div style="margin-left: 150px; margin-right: 150px;" class="bakgrund">
        <br><br>  
    <!--footer-->    
    <div class="footer2">
    <footer class="footer1">
            <p>TVÄTTBJÖRNAR</p>
            <p>KONTAKT: MAILADRESS@MAIL.SE </p>
            <p>TELEFON: 031-4151414</p>
    </footer>
    </div>   
    </div>    
</body>
</html>
