<?php
if($_SERVER["REQUEST_METHOD"] == 'POST') { 
  
$namn=$_POST['User']; //Hämtar upp från formulär
$losenord=$_POST['psw'];//Hämtar upp från formulär
$db=mysqli_connect('localhost','diaj0001','Random123','diaj0001');
//Väljer användarnamn och lösenord från databasen
$sql="SELECT Namn,Losenord FROM Anvandare WHERE Namn='$namn' AND Losenord='$losenord'";
 

$resultat=mysqli_query($db,$sql);
$row=mysqli_fetch_array($resultat);
if(password_verify($losenord, $row['Losenord'])){
  echo "<h3 style=color:red; class=font >Lösenorden matchar</h3>";
}
//if(password_verify($losenord, $hash)){
 // header('Location:Startsida.html');//Du skickas till en ny sida

//}
else{//Ifall inte användaren finns 
    echo "<h3 style=color:red; class=font >Användaren finns inte</h3>";
} 
$db->close();
} ?>
