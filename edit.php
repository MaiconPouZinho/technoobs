<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $article = $result->fetch_assoc();
} else {
    echo "Article not found";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Article</title>
</head>
<body>
  <h2>Edit Article</h2>
  <form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $article['title']; ?>" required><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content" rows="10" cols="30" required><?php echo $article['content']; ?></textarea><br>
    <button type="submit">Update</button>
  </form>
  <a href="index.php">Back to Home</a>
</body>
</html>
