<?php
$conn = new mysqli('localhost', 'root', '', 'user_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$year = $_POST['year'];
$course = $_POST['course'];
$program = $_POST['program'];

$sql = "INSERT INTO users (username, password, year, course, program) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $password, $year, $course, $program);

if ($stmt->execute()) {
    echo "Registration successful. <a href='login.php'>Login here</a>";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
