<?php
/*I denna fil kan man se koden som visas efter att användaren trycker på submit*/
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

$BilTid= $_POST['Tid']; //Hämtar upp från formulär
$BilDatum= $_POST['datum'];//Hämtar upp från formulär
$anvandare=$_SESSION['Namn'];
$Omrade=$_COOKIE['PostNr'];
$conn = new mysqli($servername, $username, $password, $dbname);

$sql="SELECT * FROM Biltvatt WHERE Datum='$BilDatum'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result); 

//IF samma tvättid samt datum existerar i databasen så kommer texten "redan bokad " upp. 
 if($BilTid==$row['Tider']&&$BilDatum==$row['Datum']&&($Omrade==$row['Postnummer'])||($BilTid=='Bokad'))
{
    echo "<p style='float:center; text-align:center; padding-right:30px;'>Redan bokad</p>";

}
//ELSE IF ifall tvättid och datum är ogiltigt eller null
else if($BilTid=='ogiltig tid'&&$BilDatum=='ogiltig datum'||$BilTid==''||$BilDatum=='')
{
    echo "<p style='float:center; text-align:center; padding-right:30px;'>Du måste fylla i giltig  datum och tid </p>";
}

//ifall det fungerar
else {

$sql= "INSERT INTO Biltvatt(Tider, Datum,Postnummer, Anvandare)
VALUES ('$BilTid', '$BilDatum','$Omrade', '$anvandare')";

$result = mysqli_query($conn, $sql)
or die ("connection failed");

echo  '<h2 style="float:center; text-align:center; padding-right:30px; ">Bokad tid</h2>';
echo'<form style="float:center; text-align:center; padding-right:30px; " method="POST">
     <div class="bakgrund" style="text-align:center;">
     <p>Hej <br>'.$anvandare.'</p>
     <p>Du har bokat följande tvätttid: <br>'.$BilTid.'<br> med datumet: <br>'.$BilDatum.'</p>
     </div>';
     $conn->close();
//nedanför kan man se en knapp som leder användaren till mina sidor.
?> <input id="knapp"  onclick="window.location.href='MinaSidor1.php'" style="background-color: rgb(141, 157, 187);
   color:white;font-family: Raleway, sans-serif; display: block; margin-left:auto; margin-right:auto;"type="button" value="Se mina sidor"><?php
}   }
?>