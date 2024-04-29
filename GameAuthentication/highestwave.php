<?php
$server  = "localhost";
$user     = "root";
$pass     = "";
$dbname   = "zombishooter7";

$con = mysqli_connect($server,$user,$pass,$dbname);

if(!$con){
    die("Nem sikerült csatlakozni");
}

$id = $_POST["id"];
$highestwave = $_POST["highestwave"];

$sql = "SELECT id FROM users WHERE id = " . $id . ";";
$result = mysqli_query($con, $sql) or die("2: Name check query failed!");

$updatesql = "UPDATE users SET highestwave = " . $highestwave . " WHERE id = " . $id . ";";
$result = mysqli_query($con, $updatesql) or die("2: Update query failed!");

echo 0;
?>