<?php
include 'db.php';

$query = "SELECT * FROM courses";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Our Courses</h1>
        <nav>
            <a href="index.html">Home</a>
            <a href="courses.php">Courses</a>
            <a href="register.html">Register</a>
            <a href="login.html">Login</a>
        </nav>
    </header>
    <main>
        <div class="course-list">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="course-card">
                    <img src="<?= $row['image_url'] ?>" alt="<?= $row['title'] ?>">
                    <h3><?= $row['title'] ?></h3>
                    <p><?= $row['description'] ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Online Learning Platform</p>
    </footer>
</body>
</html>
