<?php
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
CREATE TABLE IF NOT EXISTS contact_us (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Email VARCHAR(100),
    Phone_Number VARCHAR(20),
    Comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($tableCreation) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $comment = htmlspecialchars($_POST['message']);

    // Insert data into the contact_us table
    $stmt = $conn->prepare("INSERT INTO contact_us (Name, Email, Phone_Number, Comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phonenumber, $comment);

    if ($stmt->execute()) {
        // Redirect back to the form with a success message
        header("Location: http://localhost:8080/smulib/MainP/contact.html?success=1");
        echo "<script>alert('Message sent successfully!');</script>";
        echo "<script>window.location.href='http://localhost:8080/smulib/MainP/contact.html';</script>";
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>