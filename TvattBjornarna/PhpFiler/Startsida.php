<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSSFiler/StartsidaCSS.css">
        <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">
        <title>Startsida</title>
    </head>
    <body>
<!--menyn-->
            <ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
                    <li><a class="active" href="Startsida.php"><img src="../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                    <li style="float: right; position: arelative;"><a href="LogInPHP.php">LOGGA IN</a></li>
            </ul>
  


    <div style="margin-left: 150px; margin-right: 150px; " class="bakgrund">
    <img class="bilder1" src="../Bilder/prova.jpg" style="height: 280px; width:100%"><br><br><br>
 <?php   if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
      //Om användare trycker på information så kommer en div upp med information om tvättbjörnar
     echo '<div style=" border: 1px solid rgb(109, 122, 146); border-radius: 5px 5px 5px 5px; background-color: white; color: rgb(109, 122, 146);text-align:center; font-family: Raleway, sans-serif;
     " class="bakgrund"><h3>
       Välkommen till tvättbjörnar!<br>
       </h3>
       <p> På denna plattform kan du som hyresgäst boka tvättid, biltvätt samt hyra lokal. 
       Syftet med denna webbplats är förenkla vardagen hos våra hyresgäster.<br><br>
       Ett enkelt bokningssystem <br>
        -Boka via mobiltelefon eller datorn.<br>
        -Man kan även se tider man har bokat via mina sidor.<br>
        -Ingen medföljande kostnad. 
         </p>
        </div>';
        }
    ?>
    <form action="LogInPHP.php"><!--För att gå vidare till Logga In sidan-->
    <img class="icon1" src="../Bilder/baseline_account_circle_white_48dp.png" style="width:5%; text-align: center;">
    <button class="button" style="vertical-align:middle; margin-top: 5px;"><span>LOGGA IN </span></button><br><br>
    </form>
    <form action="BliMedlemPHP.php"><!--För att gå vidare till bli medlem sidan-->
    <img class="icon2" src="../Bilder/baseline_supervised_user_circle_white_48dp.png" style="width:5%; text-align: center;">
    <button class="button" style="vertical-align:middle"><span>BLI MEDLEM </span></button><br><br>
    </form>
    <form method="POST"><!--För att se information-->
    <img class="icon3" src="../Bilder/baseline_info_white_48dp.png" style="width:5%; text-align: center;">
    <button class="button" style="vertical-align:middle"><span>INFORMATION </span></button>
    </form>
 
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
       