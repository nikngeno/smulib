<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smulib";  // Your database name 

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);  // Select the database
} else {
    die("Error creating database: " . $conn->error);
}

// Create the `contact_us` table if it doesn't exist
$tableCreation = "
CREATE TABLE IF NOT EXISTS contact_us (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Email VARCHAR(100),
    Phone_Number VARCHAR(20),
    Comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($tableCreation) === TRUE) {
    // Table created successfully or already exists
} else {
    die("Error creating table: " . $conn->error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $comment = htmlspecialchars($_POST['message']);

    // Insert data into the `contact_us` table
    $stmt = $conn->prepare("INSERT INTO contact_us (Name, Email, Phone_Number, Comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phonenumber, $comment);

    if ($stmt->execute()) {
        $successMessage = "Thank you, $name. We have received your message.";
    } else {
        $successMessage = "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!--"<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>

<body>
    <h1>Contact Form</h1>
  

    <form action="contact.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phonenumber">Phone Number:</label>
        <input type="tel" id="phonenumber" name="phonenumber" required><br><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
-->