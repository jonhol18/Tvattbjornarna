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
    header('Location:Notauthorized.html'); // om ej inloggad tas man hit
}

$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Omr = mysqli_real_escape_string($conn,$_POST['OmradeBort']); // hämtar upp område
$Pst =mysqli_real_escape_string($conn, $_POST['PstBort']); // hämtar upp postnummer



$sql = "DELETE FROM Omraden WHERE Omrade='$Omr' AND Postnummer='$Pst'"; // sql sats som tar bort område

if ($conn->query($sql) === TRUE) {
    header ('Location: AdminOmradenPHP.php'); // om allt går bra uppdateras sidan till AdminOmradenPHP
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
