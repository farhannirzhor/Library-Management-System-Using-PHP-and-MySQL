<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Welcome to the Library</h1>
    <a href="booklist.php">Number of Books</a>
    <a href="members.php">Members List</a>
    <a href="add_book.php">Add New Book</a>
</body>
</html>
