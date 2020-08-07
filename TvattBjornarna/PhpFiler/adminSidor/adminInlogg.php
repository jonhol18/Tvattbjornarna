<?php

// **PREVENTING SESSION HIJACKING**
// Undviker javascript XSS attacker
ini_set('session.cookie_httponly', 1);
// Session ID kan inte skickas genom URLs
ini_set('session.use_only_cookies', 1);
//Använda säker connection
ini_set('session.cookie_secure', 1);
session_start();
?>
<html>
<head>
 <title>Logga In</title>
<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">
<link rel="stylesheet" href="../../CSSFiler/Mall.css">
<meta charset="UTF-8">
<ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
                <li><a class="active" href="AdminsStartsida.php"><img src="../../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                <li style="float: right; position: arelative;"><a href="adminInlogg.php">LOGGA IN</a></li>
                <li style="float: right; position: arelative;"><a href="../LogInPHP.php">LOGGA IN SOM ANVÄNDARE</a></li>

        </ul>
</head>
<?php
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    $servername = "localhost";
    $username = "joho0046";
    $password = "DyHyVtw123";
    $dbname = "joho0046";
  $dbConn=mysqli_connect( $servername,$username, $password, $dbname);
  $namn= mysqli_real_escape_string($dbConn,$_POST['AdminLog']); //Hämtar upp från formulär
  $encrypted_password= mysqli_real_escape_string($dbConn,$_POST['AdminPw']);//Hämtar upp från formulär
 //Försöker skydda med  mysqli_real_escape_string.

  //Väljer användarnamn och lösenord från databasen
  $sql="SELECT * FROM AdminInlogg WHERE Namn='$namn'";
  $resultat=mysqli_query($dbConn,$sql);
  $row=mysqli_fetch_array($resultat);
  $Adminhash=password_verify($encrypted_password,$row['Losenord']);
  if($Adminhash==$encrypted_password && $namn==$row['Namn'])//Om Admins namn och lösenord är likt det som existerar i databasen
 {
 $_SESSION['AdminNamn'] = $_POST['AdminLog']; 
  header('Location:AdminsStartsida.php');//Admin skickas isåfall till admins starsida
 }

  else{//Ifall inte användaren finns 
?>
<div class="centreraDiv"> <label style="text-align:center" class="labelStyle">Du har ej behörighet</label></div>
<?php
  } 
  $dbConn->close();//Stänger av connection
  } ?>
<body>
<div class="bakgrund"style="border:1px solid #ccc; margin-left: 150px; margin-right: 150px;">
<div class="centreraDiv">
<div>
  <br>
  <form method='POST'style="margin-top:5%"> 
    <label class="labelStyle">Användarnamn:</label><br>
    <input type="text" id="username" name="AdminLog" required>
    <label class="labelStyle">Lösenord:</label> <br>
    <input type="password" id="Password" name="AdminPw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
    <input id="ButtonLogIn" type="submit" value="Logga In">
 </form> 
 </div>
 </div>

<!--slut på div-->
<div class="footer2">
 <footer class="footer1" style="text-align: center;">
        <p>TVÄTTBJÖRNAR</p>
        <p>KONTAKT: MAILADRESS@MAIL.SE </p>
        <p>TELEFON: 031-4151414</p>
      

</footer>

</div>
</div>
</body>
</html>


