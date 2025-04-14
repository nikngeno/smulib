<?php
// Database connection details
error_reporting(E_ALL);
ini_set('display_errors', 1);
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

// Create the contact_us table if it doesn't exist
$tableCreation = "
CREATE TABLE IF NOT EXISTS users (
    UserId INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(100),
    UserName VARCHAR(100),
    Email VARCHAR(100),
    Password VARCHAR(50),
    PasswordRepeat VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($tableCreation) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registerName = htmlspecialchars($_POST['registerName']);
    $registerUsername = htmlspecialchars($_POST['registerUsername']);
    $registerEmail = htmlspecialchars($_POST['registerEmail']);
    $registerPassword = htmlspecialchars($_POST['registerPassword']);
    $registerRepeatPassword = htmlspecialchars($_POST['registerRepeatPassword']);

    if ($registerPassword !== $registerRepeatPassword) {
        die("Passwords do not match!");
    }
    $hashedPassword = password_hash($registerPassword, PASSWORD_DEFAULT);

    // Insert data into the contact_us table
    $stmt = $conn->prepare("INSERT INTO users (FullName,UserName,Email,Password) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ssss", $registerName, $registerUsername, $registerEmail, $hashedPassword);

    if ($stmt->execute()) {
        // Redirect back to the form with a success message
        header("Location: http://localhost:8080/smulib/MainP/sign_in.html?success=1");
        echo "<script>alert('Message sent successfully!');</script>";
        echo "<script>window.location.href='http://localhost:8080/smulib/MainP/sign_in.html';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    // Check if the email already exists
    // $checkEmail = $conn->prepare("SELECT * FROM users WHERE Email = ?");
    // $checkEmail->bind_param("s", $registerEmail);
    // $checkEmail->execute();
    // $result = $checkEmail->get_result();
    // if ($result->num_rows > 0) {
    //     echo "<script>alert('Email already exists!');</script>";
    //     echo "<script>window.location.href='http://localhost:8080/smulib/MainP/sign_in.html';</script>";
    //     exit();
    // }
    
    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>