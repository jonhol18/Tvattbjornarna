<?php
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);
$user = $_SESSION['Namn'];
$sql1 = "SELECT * FROM Biltvatt WHERE Anvandare='$user'"; // hämta allt från tabell
$resultat = mysqli_query($conn, $sql1)
    or die ("connection failed");
//Skriver ut tabellen med php
echo "<table align=center>";
echo "<th>ID</th><th>Tider</th><th>Datum</th><th>Postnummer</th><th>Användare</th>";
while ($row = mysqli_fetch_array($resultat)){
    echo "<tr><td>". $row['BiltvattID']."</td><td>". $row['Tider']. "</td><td>". $row['Datum']."</td><td>". $row['Postnummer']."</td><td>". $row['Anvandare']."</td></tr>"; // skriver ut från databas
}
echo "</table>";

if( isset($_POST['SearchUSER2'])) // gör så att databasen inte får tomma värden lagrade om hemsidan uppdateras 
{

// Kollar connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//Använder oss av msqli_real_escape_string för att skydda inmatningarna
$id = mysqli_real_escape_string($conn,$_POST['SearchUSER2']);//Hämtar biltvättider
$sql = "DELETE FROM Biltvatt WHERE BiltvattID='$id'";

if ($conn->query($sql) === TRUE) { // om allt gick bra
    header ('Location:MinaSidor1.php'); 
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error; // felmeddelande
}

$conn->close();
}


?>