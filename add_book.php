<?php
include 'includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    
    // File upload logic
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["book_file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is a PDF
    if ($fileType != "pdf") {
        echo "Only PDF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($_FILES["book_file"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO books (title, author, published_year, file_path) VALUES ('$title', '$author', $published_year, '$target_file')";
        if ($conn->query($sql)) {
            header('Location: booklist.php');
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Add New Book</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Book Title" required>
        <input type="text" name="author" placeholder="Author Name" required>
        <input type="number" name="published_year" placeholder="Published Year" required>
        <input type="file" name="book_file" accept=".pdf" required>
        <button type="submit">Add Book</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
