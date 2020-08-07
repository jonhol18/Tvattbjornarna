<!DOCTYPE html>
<html>
<head>
<?php
session_start();
define('CSS_PATH', 'template/css/'); //define CSS path 
define('JS_PATH', 'template/js/'); //define JavaScript path
// Undviker javascript XSS attacker
ini_set('session.cookie_httponly', 1);
// Session ID kan inte skickas genom URLs
ini_set('session.use_only_cookies', 1);
//Använda säker connection
ini_set('session.cookie_secure', 1);

if (session_id() == '' || !isset($_SESSION["Namn"])) //Om användaren inte är inloggad
{
    header('Location:Notauthorized.html');
} 
?>
    <title>Felanmälan</title>
</head>
<?php

$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
$conn = new mysqli($servername, $username, $password, $dbname); //Skapar en connection med databasen.

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);      //Om man inte kunde ansluta till databasen så visas detta. 
} 
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

//Hämtar med POST och mysqli_real_escape_string
$Plats= mysqli_real_escape_string($conn,$Plats = $_POST["Plats"]);
$Fel = mysqli_real_escape_string($conn,$_POST["Fel"]);
$Adress =mysqli_real_escape_string($conn, $_POST["adress"]);
$Beskrivning =mysqli_real_escape_string($conn, $_POST["Beskrivning"]);
$anvandare = mysqli_real_escape_string($conn,$_SESSION['Namn']);
//Parametrarna från felanmälrapporten skickas in till databasen felrapport.
$sql = "INSERT INTO Felrapport (Anvandare, Fel, Läge, Beskrivning, Adress)
VALUES ('$anvandare','$Fel', '$Plats', '$Beskrivning', '$Adress')";     //Använder nya variabler för att spara info i databasen. Titel ($BokTitle) måste vara unik.

if ($conn->query($sql) === TRUE) {
    echo "Din felanmälan har registrerats. <br>";     //Om felanmälan lyckades.
    echo "<script> setTimeout(function(){window.location.href = 'startsidalogin.php';}, 2500);</script> <br>";          //Tar en tillbaka till startsidan efter 2,5 sek. Skriven i javascript.
    echo "Tar dig till startsidan!";          
} else 
{
    echo "Oj, någonting gick fel. Var vänlig försök igen. Om problemet kvarstår så kontakta administratör.  <br>"; 
    //Om någonting inte funkade, tex boktiteln redan finns visas detta.
}
}
?>
</html>