<!Doctype html>
<html>

<?php
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
//Skapa anslutning
$conn = new mysqli($servername, $username, $password, $dbname);
// Kolla anslutningen
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//Använder oss av MYSQL-funktioner. Inte lika säkert som PDO, men säkrare än inget.
$filter="SELECT * FROM Omraden";
$resultat=mysqli_query($conn,$filter);

echo "Show rooms:";

while ($row = mysql_fetch_array($filter))
{
 $menu .="<option>" . $row['Omrade'] . "</option>";

}
$menu = "</select></form>";
echo $menu;

?>

</html>