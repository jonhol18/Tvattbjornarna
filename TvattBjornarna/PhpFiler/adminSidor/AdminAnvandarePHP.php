<?php
require '../../htmlFiler/adminAnvandare.html';
?>

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
    header('Location:Notauthorized.html');
}

$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);
// Kollar connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1 = "SELECT * FROM Anvandare"; // hämta allt från tabell

$resultat = mysqli_query($conn, $sql1)
    or die ("connection failed");

?>

<br><div id="flip"><h3>MEDLEMMAR</h3></div>
<div id="panel">
<?php
echo "<table align=center>";
echo "<th>NAMN</th><th>TELEFONNUMMER</th><th>LÄGENHETSNUMMER</th><th>POSTNUMMER</th>";
while ($row = mysqli_fetch_array($resultat)){
    echo "<tr><td>". $row['Namn']. "</td><td>". $row['Telefonnummer']."</td><td>". $row['Lagenhetsnummer']."</td><td>". $row['Postnummer']."</td></tr>"; // skriver ut från databas
}
echo "</table>";
?>
</div><br>

<?php
echo "<br><h3> UPPDATERA ANVÄNDARE </h3>";

if(isset($_POST['Telefonnummer']))
{
    // Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);
// Kollar connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
$tele = mysqli_real_escape_string($conn,$_POST['Telefonnummer']);//Hämtar upp inmatningar
$lgn = mysqli_real_escape_string($conn,$_POST['Lägenhetsnummer']);
$pst = mysqli_real_escape_string($conn,$_POST['Postnummer']);
$namn =mysqli_real_escape_string($conn, $_POST['Namn']);


    
$sql2 = "UPDATE Anvandare SET Telefonnummer='$tele', Lagenhetsnummer='$lgn', Postnummer='$pst' WHERE Namn='$namn'";
    
if ($conn->query($sql2) === TRUE) {
header ('Location: AdminAnvandarePHP.php');
} 
    
else {
echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();

}

?>

<form action="AdminAnvandarePHP.php" method="POST">
        <input type="text" value="Namn" onfocus="if (this.value=='Namn') this.value='';" name="Namn">
        <input type="text" value="Telefonnummer" onfocus="if (this.value=='Telefonnummer') this.value='';" name="Telefonnummer">
        <input type="text" value="Lägenhetsnummer" onfocus="if (this.value=='Lägenhetsnummer') this.value='';" name="Lägenhetsnummer">
        <input type="text" value="Postnummer" onfocus="if (this.value=='Postnummer') this.value='';" name="Postnummer">
        <input type="submit" value="Uppdatera" name="skicka">    
</form>

        <br><h3>TA BORT ANVÄNDARE </h3>

        <form action="adminTabortAnvandare.php" method="POST">
        <input type="text" value="Namn" onfocus="if (this.value=='Namn') this.value='';" name="Namn"><br>
        <input type="submit" value="Ta bort" name="skicka">    
</form>

<div class="footer2">
        <footer class="footer1" style="text-align: center;">
            <p>NAMN PÅ FÖRETAG</p>
            <p>KONTAKT: MAILADRESS@MAIL.SE </p>
            <p>TELEFON: 031-4151414</p>
            <a href="">Admin inlogg:<br><img src="../../Bilder/adminBild.png"></a>
        </footer>
</div>

</body>
</html>