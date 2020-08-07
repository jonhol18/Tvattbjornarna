<?php
/*I denna fil kan man se koden som visas efter att användaren trycker på submit*/
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
// Skapar connection med databas
$conn = new mysqli($servername, $username, $password, $dbname);

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
$tvattTid= $_POST['Tid']; //Hämtar upp från formulär
$datumTvatt= $_POST['datum'];//Hämtar upp från formulär
$anvandare=$_SESSION['Namn'];
$Postnr=$_COOKIE['PostNr'];
$sql="SELECT * FROM Tvattstuga WHERE Datum='$datumTvatt'";
$resultat=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($resultat);   

//IF samma tvättid samt datum existerar i databasen så kommer texten "redan bokad " upp. 
 if(($tvattTid==$row['Tvattider'])&& ($datumTvatt==$row['Datum'] )&&( $Postnr==$row['Postnummer'])||($tvattTid=='Bokad'))
{
    echo "<p style='float:center; text-align:center; padding-right:30px;'>Redan bokad</p>";

}
//ELSE IF ifall tvättid och datum är ogiltigt eller null
else if($tvattTid=='ogiltig tid'&&$datumTvatt=='ogiltig datum'||$tvattTid==''||$datumTvatt=='')
{
    echo "<p style='float:center; text-align:center; padding-right:30px;'>Du måste fylla i giltig  datum och tid </p>";
}

//ifall det fungerar
else {
$connSECOND = new mysqli($servername, $username, $password, $dbname);
$sql= "INSERT INTO Tvattstuga(Tvattider, Datum, Postnummer,Anvandare)
VALUES ('$tvattTid', '$datumTvatt','$Postnr', '$anvandare')";

$resultat = mysqli_query($connSECOND, $sql)
or die ("connection failed");
echo  '<h2 style="float:center; text-align:center; padding-right:30px; ">Bokad tid</h2>';
echo'<form style="float:center; text-align:center; padding-right:30px; " method="POST">
     <div class="bakgrund" style="text-align:center;">
     <p>Hej <br>'.$anvandare.'</p>
     <p>Du har bokat följande tvätttid: <br>'.$tvattTid.'<br> med datumet: <br>'.$datumTvatt.'</p>
     </div>';
     $conn->close();
   
//nedanför kan man se en knapp som leder användaren till mina sidor.
?> <input id="knapp"  onclick="window.location.href='MinaSidor1.php'" style="background-color: rgb(141, 157, 187);
   color:white;font-family: Raleway, sans-serif; display: block; margin-left:auto; margin-right:auto;"type="button" value="Se mina sidor"><?php
}  }
?>