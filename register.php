<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <form action="process_registration.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Year:</label>
        <input type="text" name="year" required><br><br>

        <label>Course:</label>
        <input type="text" name="course" required><br><br>

        <label>Program:</label>
        <input type="text" name="program" required><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
