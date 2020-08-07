<?php
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {   //När formuläret skickas så startar php
    $servername = "localhost";
    $username = "joho0046";
    $password = "DyHyVtw123";
    $dbname = "joho0046";

    $usernamee= htmlspecialchars($_POST['User']);//Hämtar med POST. 
    $passworde= htmlspecialchars($_POST['psw']);
    $telephone=htmlspecialchars($_POST['Telephone']);
    $lgnr=htmlspecialchars($_POST['lgnr']);
    $postnr=htmlspecialchars($_POST['postnr']);
    $hashed_password = password_hash($passworde, PASSWORD_DEFAULT);
   
    //Skapa anslutning
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Kolla anslutningen
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Anvandare(Namn,Losenord,Telefonnummer,Lagenhetsnummer,Postnummer)
    VALUES ('$usernamee','$hashed_password','$telephone','$lgnr','$postnr')";//Skapar medlem
   
    if($conn->query($sql) ===TRUE)//Om det funkar
    {
    header('Location:LogInPHP.php');
    }
    else if($conn->query($sql) ===FALSE )//Om det inte funkar
    {
       echo "<h3 style=color:#ff0000; class=font >Användarnamnet finns redan.Testa igen</h3>";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();//Stänger anslutningen
}
?>