<?php
define('CSS_PATH', 'template/css/'); //define CSS path 
define('JS_PATH', 'template/js/'); //define JavaScript path
// Undviker javascript XSS attacker
ini_set('session.cookie_httponly', 1);
// Session ID kan inte skickas genom URLs
ini_set('session.use_only_cookies', 1);
//Använda säker connection
ini_set('session.cookie_secure', 1);
?>
<html>
<head>
 <title>Logga In</title>
<link rel="stylesheet" href="../CSSFiler/Mall.css">
<meta charset="UTF-8">

<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">
<ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
                <li><a class="active" href="Startsida.php"><img src="../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                <li style="float: right; position: arelative;"><a href="LogInPHP.php">LOGGA IN</a></li>
        </ul>
</head>
<?php
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {   //När formuläret skickas så startar php
   /* $servername = "localhost";
    $username = "joho0046";
    $password = "DyHyVtw123";
    $dbname = "joho0046";
    //Skapa anslutning
  $dbConn = new mysqli($servername, $username, $password, $dbname);
   // Kolla anslutningen */

    include "connectDatabase.php";

  if ($dbConn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  //Använder oss av MYSQL-funktioner. Inte lika säkert som PDO, men säkrare än inget.
  $usernamee= mysqli_real_escape_string($dbConn,$_POST['User']);//Hämtar med POST. 
  $passworde= mysqli_real_escape_string($dbConn,$_POST['psw']);
  $telephone= mysqli_real_escape_string($dbConn,$_POST['Telephone']);
  $lgnr= mysqli_real_escape_string($dbConn,$_POST['lgnr']);
  $postnr=mysqli_real_escape_string($dbConn,$_POST['postnr']);

  //Krypterar lösenord med hjälp av PASSWORD_DEFAULT
  $hashed_password = password_hash($passworde, PASSWORD_DEFAULT); 
  $sql = "INSERT INTO Anvandare(Namn,Losenord,Telefonnummer,Lagenhetsnummer,Postnummer)
  VALUES ('$usernamee','$hashed_password','$telephone','$lgnr','$postnr')";//Skapar medlem

  if($dbConn->query($sql) ===TRUE)//Om det funkar
  {
  header('Location:LogInPHP.php');
  }
  else if($dbConn->query($sql) ===FALSE )//Om det inte funkar
  {
   echo '<div class="centreraDiv"> <label style="text-align:center" class="labelStyle">Ojsan, något gick fel! </label></div>';
   echo ("Error: ". $dbConn -> error);

  }
  else {
  echo "Error: " . $sql . "<br>" . $dbConn->error;
  }
  $dbConn->close();//Stänger anslutningen
  }
?>
<!--slut på php kod-->

<body>
<div class="bakgrund" style="border:1px solid #ccc;border-radius: 0px 0px 5px 5px;margin-left: 150px; margin-right: 150px;">

<div class="centreraDiv">
  <br>

  <form method='POST'style="margin-top:5%"> 
   <!-- <label class="labelStyle">Användarnamn:</label><br>-->
    <input type="text" placeholder="Användarnamn" id="username" name="User" style="width:50%" required>
   <!-- <label class="labelStyle">Lösenord:</label> <br>-->
    <input type="password" placeholder="Lösenord" id="Password" name="psw"style="width:50%" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Lösenordet måste innehålla minst en stor bokstav, en liten bokstav, ett speciellt tecken samt ett nummer" required>
    <!--<label class="labelStyle">Telefonnummer:</label><br>-->
    <input type="number" placeholder="Telefonnummer" id="telephone"style="width:50%" name="Telephone" required><br>
    <!--<label class="labelStyle">Lägenhetsnummer och postnummer:</label><br>-->
    <input type="number" placeholder="Lägenhetsnummer" id="lgnr" name="lgnr" required>
    <input type="number"  placeholder="Postnummer" id="postnr" name="postnr" required > <br>
    <input id="ButtonLogIn" type="submit"style="width:50%" value="Bli Medlem">
</form> 
</div>
<!--slut på div-->
<div class="footer2">
 <footer class="footer1" style="text-align: center;">
        <p>TVÄTTBJÖRNAR</p>
        <p>KONTAKT: MAILADRESS@MAIL.SE </p>
        <p>TELEFON: 031-4151414</p>
       <li> <a href="adminSidor/adminInlogg.php" >Admin Inlogg:<img src="../Bilder/adminBild.png"></a></li>

</footer>

</div>
</div>
</body>
</html>


