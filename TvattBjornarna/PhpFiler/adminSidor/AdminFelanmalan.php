<?php
//Session cookie så att bara Admin kan gå in på denna sidan

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
    header('Location:Notauthorized.html');//Om inte användaren är inloggad kommer man till denna sidan
}
?>
  <html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../CSSFiler/cssFelanmalan.css">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Raleway" rel="stylesheet">

<!--meny-->
                <ul class="meny" style="margin-left: 150px; margin-right: 150px; margin-top: 0px;">
                <li><a class="active" href="AdminsStartsida.php"><img src="../../Bilder/tvatt.png" height="25px;" style="position: relative; left: 0%"></a></li>
                <li style="float: right; position: arelative;"><a href="../LogOutPHP.php">LOGGA UT</a></li>
                <li style="float: right; position: arelative;"><a href="AdminOmradenPHP.php">OMRÅDEN</a></li>
                <li style="float: right; position: arelative;"><a href="AdminAnvandarePHP.php">ANVÄNDARE</a></li>
                <li style="float: right; position: arelative;"><a href="AdminSeTider.php">BOKADE TIDER</a></li>

              
        </ul>
        </head>
        <body>
        <div style="margin-left: 150px; margin-right: 150px;" class="bakgrund">
        <br><br>  
<?php
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);

echo "<br><h3>ÖVERBLICK AV FELANMÄLAN</h3>";

$sql1 = "SELECT * FROM Felrapport"; // hämta allt från tabellen felrapport
$resultat = mysqli_query($conn, $sql1)
    or die ("connection failed");

echo "<table align=center>";
echo "<th>ID</th><th>Användare</th><th>Läge</th><th>Fel</th><th>Beskrivning</th><th>Adress</th>";
while ($row = mysqli_fetch_array($resultat)){
    echo "<tr><td>". $row['Serienummer']. "</td><td>". $row['Anvandare']."</td><td>". $row['Läge']."</td><td>". $row['Fel']."</td><td>". $row['Beskrivning']."</td><td>". $row['Adress']."</td></tr>"; // skriver ut från databas
}
echo "</table>";


if( isset($_POST['IDBort'])) 
{
$ID= mysqli_real_escape_string($conn,$_POST['IDBort']);//Hämtar upp användare från inmatning 

// Kollar connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "DELETE FROM Felrapport WHERE Serienummer='$ID'";//Tar bort felanmälan där serienummer är lika med den inmatning som admin matar in!

if ($conn->query($sql) === TRUE) { // om allt gick bra
    header ('Location: AdminFelanmalan.php'); 
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error; // felmeddelande
}

$conn->close();
}

?>
        <!-- HTML fortsätter här -->


        <br><h3>TA BORT FELANMÄLAN</h3>

        <form method="POST">
        <input type="text" value="Fyll i ID" onfocus="if (this.value=='ID') this.value='';" name="IDBort"><br>
        <input type="submit" value="Ta bort" name="Skicka">
        </form>

        <div class="footer2">
        <footer class="footer1" style="text-align: center;">
            <p>TVÄTTBJÖRNAR</p>
            <p>KONTAKT: MAILADRESS@MAIL.SE </p>
            <p>TELEFON: 031-4151414</p>
        </footer>
        </div>

</body>
</html>