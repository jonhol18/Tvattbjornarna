<?php

session_start(); // starta session
define('CSS_PATH', 'template/css/'); //define CSS path 
define('JS_PATH', 'template/js/'); //define JavaScript path

if (session_id() == '' || !isset($_SESSION["AdminNamn"])) 
{
    header('Location:Notauthorized.html');
}

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

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

$namn =mysqli_real_escape_string($conn, $_POST['Namn']);//Hämtar upp användarens namn från inmatning



$sql = "DELETE FROM Anvandare WHERE Namn='$namn'"; // ta bort från tabellen Anvandare 

if ($conn->query($sql) === TRUE) {
    header ('Location: AdminAnvandarePHP.php'); // uppdaterar sidan när sql frågan utförts
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

?>
