<?php
include 'includes/db.php';

$registration_success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql)) {
        $registration_success = true;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php if ($registration_success): ?>
        <h2>Registration Successful</h2>
        <p><a href="login.php">Go back to the login page</a></p>
    <?php else: ?>
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already registered? <a href="login.php">Go to login page</a></p>
    <?php endif; ?>
</body>
</html>
