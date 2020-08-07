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
if (session_id() == '' || !isset($_SESSION["Namn"])) //Om användaren inte är inloggad
{
    header('Location:Notauthorized.html');//obehöriga användare skickas till en annan sida
}

?>

<html>
    <head>
        <link rel="stylesheet" href="../CSSFiler/LokaltvattCSS.css">
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">

<!--menyn-->
    <ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
                <li><a class="active" href="startsidalogin.php"><img src="../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                <li style="float: right; position: arelative;"><a href="LogOutPHP.php">LOGGA UT</a></li>
                <li style="float: right; position: arelative;"><a href="Felanmalan.php">FELANMÄLAN</a></li>
                <li style="float: right; position: arelative;"><a href="BokaTvattid.php">BOKA TVÄTTID</a></li>
                <li style="float: right; position: arelative;"><a href="BokaBiltvatt.php">BOKA BILTVÄTT</a></li>
                <li style="float: right; position: arelative;"><a href="#about">BOKA LOKAL</a></li>
        </ul>
        </head>
        <body>
        <div style="margin-left: 150px; margin-right: 150px;" class="bakgrund">
        <br><br>  
 <?php
 //Kalender 
 include 'lokalSubmit.php';//Hämtar php filen där svaret från submit form existerar

 //Kalender 
    $week = date('W');//hämtar datum
    $year = (isset($_GET['year']))?$_GET['year']:date('Y');//Hämtar år
    $week = (isset($_GET['week']))?$_GET['week']:Date('W');//Hämta vecka
 
    if($week > 52) {//If-week är högre än 52
     $year++;
     $week = 1;//Veckan blir 1 igen
 } elseif($week < 1) { // Om week är lägre än 1
     $year--;
     $week = 52;
 }
 
  //Att se nästa vecka
  $nextWeekLink= '<a href='.$_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year.">Nästa Vecka</a><br>" ;
  //Att se förgående veckor.
 
  $previousWeekLink= '<a id="pdate" href='.$_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year.">Förgående vecka</a><br>" ;


 $servername = "localhost";
 $username = "joho0046";
 $password = "DyHyVtw123";
 $dbname = "joho0046";
$anvandare=$_SESSION['Namn'];
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);

 if($conn->connect_error) 
   die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
 
 //first statement
 $query = "SELECT Postnummer FROM Anvandare WHERE Namn='$anvandare'";
 $result = mysqli_query($conn, $query);
 $row=mysqli_fetch_array($result); 
 //second statement
 $query2="SELECT * FROM Omraden WHERE Postnummer='$row[Postnummer]'";
 $result2 = mysqli_query($conn, $query2);
 $row=mysqli_fetch_array($result2);   
 $omrade=$row['Omrade'];

 if($omrade=='')
 {
    echo '<h2 style="float:center; text-align:center; padding-right:30px; ">Ditt postnummer verkar inte existera. <br> Vänligen kontakta admin! </h2>';//$week visar enbart veckan
 }
 else{
 $postNummer=$row['Postnummer'];
 setcookie('PostNr', $postNummer, time() +3600);
 echo '<h2 style="float:center; text-align:center;">Välj lokal hos området <br>'.$omrade.'</h2>';//$week visar enbart veckan
 echo '<h2 style="float:center; text-align:center;">Vecka: <br>'.$week.'</h2>';//$week visar enbart veckan
 echo'<form method="POST">
      <div class="bakgrund" style="text-align:center;">
      <p>Välj datum:</p><textarea readonly style="resize:none; overflow:auto; display: block; margin-left:auto; margin-right:auto;" id="datum" name ="datum" required></textarea>
      <p>Välj tid:</p><textarea readonly style="resize:none; overflow:auto; display:block; margin-left:auto; margin-right:auto;" id="Tid" name="Tid" required></textarea>
      <p>Observera att man kan enbart välja ett datum samt tid per bokning! </p>
      </div>
      <table cellpadding="0" cellspacing="0" class="calendar">
      <tr class="calendar-row" >';//vi har valt att lägga kalendern i en form så att man kan skicka parametrarna til en annan sida
  if($week > Date('W'))
  {
     echo '<div style="text-align:center; position:relative;">'.$previousWeekLink.'</div>';//för att användare skall kunna ändra veckor 
  }
 
 echo '<div style="text-align:center; position:relative;">'.$nextWeekLink.'</div>';//för att användare skall kunna ändra veckor 
 echo '<div style="clear:both;"></div>';
 echo '<br /><br />';
 $conn->close();//Stänger anslutningen   
     
     $lokaltid1="10-13";//Här skapas tvätttiderna som en variabel
     $lokaltid2="14-17";
     $lokaltid3="18-21";
 
  for($day=1; $day<=7; $day++)//Första tabellraden. 
  {
   
  $d = strtotime($year.'W'.$week.$day);                           
  echo '<th id="datum1" onClick="datum(this)">'.date('l',$d ).'<br>';//Hämtar upp både datum och dag
  echo  date('d M',$d)."<br></th>";  
  
  }
  echo '</tr>';
  echo  '<tr class="calendar-row">';
  for($day=1; $day<=7; $day++)//Andra raden, 10-13
  {
  /*Alla tvättider skickas i en javascript funktion vid namn booking.*/
  echo  '<td id="tvattid1" onclick="booking(this)">'.$lokaltid1.'</td>';
  }
  echo '</tr><tr>';
  for($day=1; $day<=7; $day++)//tredje raden, 14-17
  {
     echo  '<td id="tvattid2" onclick="booking(this)">'.$lokaltid2.'</td>';
  }
  echo  '</tr><tr>';
  for($day=1; $day<=7; $day++)//fjärde raden, 18-21
  {
     echo  '<td id="tvattid3" onclick="booking(this)">'.$lokaltid3.'</td>';
  }
 
 echo  '</tr>';
 echo '</table><br>';
 include 'javascriptFunction.php';
 
 echo '<input id="submitB"type="submit" value="Boka tid">';//Knappen för submit
 echo '</form>';
}

?> 
 
<div class="footer2">
                    <footer class="footer1" style="text-align: center;">
                                <p>NAMN PÅ FÖRETAG</p>
                                <p>KONTAKT: MAILADRESS@MAIL.SE </p>
                                <p>TELEFON: 031-4151414</p>
                    </footer>
                </div>
                </div>
</body>
</html> 