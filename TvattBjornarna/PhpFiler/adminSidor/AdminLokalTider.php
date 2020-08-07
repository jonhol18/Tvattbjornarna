<?php
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);


$sql1 = "SELECT * FROM Lokal"; // hämta allt från tabell
$resultat = mysqli_query($conn, $sql1)
    or die ("connection failed");

echo "<table align=center>";
echo "<th>Tider</th><th>Datum</th><th>Postnummer</th><th>Användare</th>";
while ($row = mysqli_fetch_array($resultat)){
    echo "<tr><td>". $row['Tider']. "</td><td>". $row['Datum']."</td><td>". $row['Postnummer']."</td><td>". $row['Anvandare']."</td></tr>"; // skriver ut från databas
}
echo "</table>";

if( isset($_POST['SearchUSER3'])) // gör så att databasen inte får tomma värden lagrade om hemsidan uppdateras 
{
$user= mysqli_real_escape_string($conn,$_POST['SearchUSER3']);//Hämtar upp användare från inmatning 

// Kollar connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//SQL ta bort Lokal tider där användare är den namnet som admin matar in
$sql = "DELETE FROM Lokal WHERE Anvandare='$user'";

if ($conn->query($sql) === TRUE) { // om allt gick bra
    header ('Location:AdminSeTider.php'); 
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error; // felmeddelande
}

$conn->close();
}


?>