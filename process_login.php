<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'user_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: view_users.php");
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$stmt->close();
$conn->close();
?>
