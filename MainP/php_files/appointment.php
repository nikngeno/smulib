<?php
session_start();
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smulib";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);
} else {
    die("Error creating database: " . $conn->error);
}

// Create the `Appointment` table if it doesn't exist
$tableCreation = "
CREATE TABLE IF NOT EXISTS appointment (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    AppointmentDate date,
    AppointmentTime time,
    Location text,
    Name text,
    Email text,
    LibraryCardNumber int,
    Comments text,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($tableCreation) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $AppointmentDate = htmlspecialchars($_POST['AppointmentDate']);
    $AppointmentTime = htmlspecialchars($_POST['AppointmentTime']);
    $Location = htmlspecialchars($_POST['Location']);
    $Name = htmlspecialchars($_POST['Name']);
    $Email = htmlspecialchars($_POST['Email']);
    $LibraryCardNumber = htmlspecialchars($_POST['LibraryCardNumber']);
    $Comments = htmlspecialchars($_POST['Comments']);

    // Insert data into the `Appointment` table
    $stmt = $conn->prepare("INSERT INTO appointment (AppointmentDate, AppointmentTime, Location, Name,Email,LibraryCardNumber,Comments) VALUES (?, ?, ?, ?,?,?,?)");
    $stmt->bind_param("sssssis", $AppointmentDate, $AppointmentTime, $Location, $Name, $Email, $LibraryCardNumber, $Comments);

    if ($stmt->execute()) {
        // Redirect back to the form with a success message
        header("Location: http://localhost:8080/smulib/MainP/bookappointment.html?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process the form...

        }
    }


    // Close the statement
    $stmt->close();

// Close the connection
$conn->close();
