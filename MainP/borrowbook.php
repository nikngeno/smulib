<?php

$search = $_POST['search'];
//$limit = $_POST['limit'];
//$offset = $_POST['offset'];
//$sort = $_POST['sort'];


$host = "localhost";
$user = "root";
$pass = "";
$db = "smulib";


$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

echo 'Connected successfully';

$sql = "select * from books where BookName like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["BookName"] . "  " . $row["BookAuthor"] . "  " . $row["PublicationYear"] . " " . $row["Genre"] . " " . $row["Price"] . " " . $row["Description"] . "<br>";
    }
} else {
    echo "No records";
}

$conn->close();
