<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'user_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, year, course, program FROM users";
$result = $conn->query($sql);

echo "<h2>Registered Users</h2>";
echo "<table border='1'>
<tr>
    <th>Username</th>
    <th>Year</th>
    <th>Course</th>
    <th>Program</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['username']}</td>
        <td>{$row['year']}</td>
        <td>{$row['course']}</td>
        <td>{$row['program']}</td>
    </tr>";
}

echo "</table>";

$conn->close();
?>
<a href="logout.php">Logout</a>
