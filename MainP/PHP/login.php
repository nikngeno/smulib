<?php
session_start();

// Connect to the database
$servername = "localhost";
$dbname = "smulib";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST['loginName'] ?? '');
    $Password = $_POST['Password'] ?? '';

    // Validate input
    //echo "Submitted Input: " . $input . "<br>";
    //echo "Submitted Password: " . $Password . "<br>";

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT UserId, UserName, Email, Password FROM users WHERE UserName = ? OR Email = ?");
    $stmt->bind_param("ss", $input, $input);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($Password, $user['Password'])) {
            // Store user session data
            $_SESSION['user_id'] = $user['UserId'];
            $_SESSION['username'] = $user['UserName'];
            
            echo "<script>alert('Login successful! Redirecting to your profile.'); window.location.href='http://localhost:8080/smulib/MainP/PHP/profile.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";
    }

    $stmt->close();
}
$conn->close();
?>
