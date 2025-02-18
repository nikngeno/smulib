<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "smulib";


$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

echo 'Connected successfully';
