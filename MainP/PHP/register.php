<?php
// Enable detailed errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smulib";  

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

// Create the users table with additional columns if it doesn't exist
$tableCreation = "
CREATE TABLE IF NOT EXISTS users (
    UserId INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(100),
    UserName VARCHAR(100) UNIQUE,
    Email VARCHAR(100) UNIQUE,
    Phone VARCHAR(20),
    Address VARCHAR(255),
    Password VARCHAR(255),
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
    $registerPhone = htmlspecialchars($_POST['registerPhone']);
    $registerAddress = htmlspecialchars($_POST['registerAddress']);
    $registerPassword = htmlspecialchars($_POST['registerPassword']);
    $registerRepeatPassword = htmlspecialchars($_POST['registerRepeatPassword']);

    if ($registerPassword !== $registerRepeatPassword) {
        header("Location: ../sign_in.html?error=PasswordsDontMatch");
        exit();
    }

    // Check if user already exists
    $checkUserStmt = $conn->prepare("SELECT UserId FROM users WHERE Email = ? OR UserName = ?");
    if ($checkUserStmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $checkUserStmt->bind_param("ss", $registerEmail, $registerUsername);
    $checkUserStmt->execute();
    $result = $checkUserStmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../sign_in.html?error=UserExists");
        exit();
    }
    $checkUserStmt->close();

    // Hash the password securely
    $hashedPassword = password_hash($registerPassword, PASSWORD_DEFAULT);

    // Insert user data including phone and address
    $stmt = $conn->prepare("INSERT INTO users (FullName, UserName, Email, Phone, Address, Password) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $registerName, $registerUsername, $registerEmail, $registerPhone, $registerAddress, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: ../sign_in.html?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
