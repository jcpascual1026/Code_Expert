<?php

$hostName ="localhost";
$dbUser ="root";
$dbPassword = "";
$dbName ="account_system";
$conn = mysqli_connect($hostName, $dbUser,$dbPassword,$dbName);
if(!$conn){
    die("Something went wrong");
}
?>