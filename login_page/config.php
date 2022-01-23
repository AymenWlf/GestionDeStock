<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "gestion de stock";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failedddddd.')</script>");
}

?>