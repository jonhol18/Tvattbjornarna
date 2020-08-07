<?php
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);
$user = $_SESSION['Namn'];
$sql1 = "SELECT * FROM Tvattstuga WHERE Anvandare='$user'"; // hämta allt från tabell
$resultat = mysqli_query($conn, $sql1)
    or die ("connection failed");

echo "<table align=center>";
echo "<th>ID</th><th>Tvätttider</th><th>Datum</th><th>Användare</th>";
while ($row = mysqli_fetch_array($resultat)){
    echo "<tr><td>". $row['TvattstugeID']."</td><td>". $row['Tvattider']. "</td><td>". $row['Datum']."</td><td>". $row['Anvandare']."</td></tr>"; // skriver ut från databas
}
echo "</table>";

if( isset($_POST['SearchUSER'])) // gör så att databasen inte får tomma värden lagrade om hemsidan uppdateras 
{

// Kollar connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//Skyddar inmatningen med hjälp av mysqli_real_escape_string
$id = mysqli_real_escape_string($conn,$_POST['SearchUSER']);//Hämtar användarens inmatning
$sql = "DELETE FROM Tvattstuga WHERE TvattstugeID='$id'";

if ($conn->query($sql) === TRUE) { // om allt gick bra
    header ('Location:MinaSidor1.php'); 
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error; // felmeddelande
}

$conn->close();
}


?>