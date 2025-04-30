<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

$conn = new mysqli("localhost", "root", "", "smulib");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT FullName, UserName, Email, Phone, Address FROM users WHERE UserId = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    echo json_encode([
        'success' => true,
        'data' => [
            'fullName' => $user['FullName'],
            'username' => $user['UserName'],
            'email' => $user['Email'],
            'phone' => $user['Phone'],
            'address' => $user['Address'],
            'profilePhoto' => '../Imgs/usersphotos/default.jpg', // default or dynamic path
            'history' => ['Design Patterns', 'Introduction to Algorithms'] // sample static history
        ]
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'User not found']);
}

$stmt->close();
$conn->close();
?>
