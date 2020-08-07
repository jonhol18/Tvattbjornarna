<?php
$servername = "localhost";
$username = "joho0046";
$password = "DyHyVtw123";
$dbname = "joho0046";
$dbConn = new mysqli($servername, $username, $password, $dbname); //Skapar en connection med databasen.

if ($dbConn->connect_error) {
    die("Connection failed: " . $dbConn->connect_error);      //Om man inte kunde ansluta till databasen så visas detta.
}
?>