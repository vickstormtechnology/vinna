<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'vinna';
@$connect = mysqli_connect("$dbHost","$dbUser","$dbPass","$dbName");

if(!$connect){
    $error = "connect refused in database.php";
}

?>