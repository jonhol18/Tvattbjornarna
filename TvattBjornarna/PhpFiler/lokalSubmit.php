<?php
/*I denna fil kan man se koden som visas efter att användaren trycker på submit*/
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

$lokalTid= $_POST['Tid']; //Hämtar upp från formulär
$lokalDatum= $_POST['datum'];//Hämtar upp från formulär
$anvandare=$_SESSION['Namn'];
$Omrade=$_COOKIE['PostNr'];
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="SELECT * FROM Lokal WHERE Datum='$lokalDatum'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result); 

//IF samma tvättid samt datum existerar i databasen så kommer texten "redan bokad " upp. 
 if($lokalTid==$row['Tider']&&$lokalDatum==$row['Datum']&&$Omrade==$row['Postnummer']||$lokalTid=='Bokad')
{
    echo "<p style='float:center; text-align:center; padding-right:30px;'>Redan bokad</p>";

}
//ELSE IF ifall tiden och datum är ogiltigt eller null
else if($lokalTid=='ogiltig tid'&&$lokalDatum=='ogiltig datum'||$lokalTid==''||$lokalDatum=='')
{
    echo "<p style='float:center; text-align:center; padding-right:30px;'>Du måste fylla i giltig  datum och tid </p>";
}

//ifall det fungerar
else {

$sql= "INSERT INTO Lokal (Tider, Datum, Postnummer, Anvandare)
VALUES ('$lokalTid', '$lokalDatum','$Omrade', '$anvandare')";

$result = mysqli_query($conn, $sql)
or die ("connection failed");

echo  '<h2 style="float:center; text-align:center; padding-right:30px; ">Bokad tid</h2>';
echo'<form style="float:center; text-align:center; padding-right:30px; " method="POST">
     <div class="bakgrund" style="text-align:center;">
     <p>Hej <br>'.$anvandare.'</p>
     <p>Du har bokat följande lokal-tid: <br>'.$lokalTid.'<br> med datumet: <br>'.$lokalDatum.'</p>
     </div>';
     $conn->close();
//nedanför kan man se en knapp som leder användaren till mina sidor.
?> <input id="knapp"  onclick="window.location.href='MinaSidor1.php'" style="background-color: rgb(141, 157, 187);
   color:white;font-family: Raleway, sans-serif; display: block; margin-left:auto; margin-right:auto;"type="button" value="Se mina sidor"><?php
}   }
?>