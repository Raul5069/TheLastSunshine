<?php
$server  = "localhost";
$user     = "root";
$pass     = "";
$dbname   = "zombishooter7";

$con = mysqli_connect($server,$user,$pass,$dbname);

if(!$con){
    die("Nem sikerült csatlakozni");
}

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT id, name, email, password, highestwave FROM users WHERE email = '" . $email . "';";
$result = mysqli_query($con, $sql) or die("2: Name check query failed!");

$user = $result->fetch_assoc();
$encryptedpasswd = $user["password"];
//$encpass = password_hash($password, PASSWORD_BCRYPT);
if(password_verify($password, $encryptedpasswd)){
    echo "0," . $user["name"] . "," . $user["highestwave"] . "," . $user["id"];
} else {
    echo "4: Helytelen jelszó!";
}
?>