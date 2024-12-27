<?php
include 'includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Book List</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Read Book</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['published_year']; ?></td>
                    <td><a href="<?php echo $row['file_path']; ?>" target="_blank">Read</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
