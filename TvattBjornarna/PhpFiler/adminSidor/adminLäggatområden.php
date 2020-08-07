<?php
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";

if( isset($_POST['Omrade'])) // gör så att databasen inte får tomma värden lagrade om hemsidan uppdateras 
{
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);
// Kollar connection


$Omr = mysqli_real_escape_string($conn,$_POST['Omrade']);
$Pst =mysqli_real_escape_string($conn, $_POST['Postnummer']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Omraden (Omrade, Postnummer) VALUES ('$Omr', '$Pst')"; // min sql fråga för att uppdatera databas

if ($conn->query($sql) === TRUE) { // om allt gick bra
    echo ("Områden uppdaterad"); 

} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error; // felmeddelande
}

$conn->close(); 
}
?>