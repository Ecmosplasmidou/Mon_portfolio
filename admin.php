<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>
<div class="container">
    <h1 class="text-center my-5 text-white">Admin - Portfolio</h1>

    <a href="add_project.php" class="btn btn-primary mb-3">Add New Project</a>

    <div class="row">
        <?php
        $stmt = $pdo->query('SELECT * FROM projects');
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
            <div class='col-md-4'>
                <div class='card mb-4'>
                    <img src='{$row['image']}' class='card-img-top' alt='{$row['title']}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['title']}</h5>
                        <a href='edit_project.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                        <a href='delete_project.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>




<?php
/*
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include 'includes/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>
<div class="container">
    <h1 class="text-center my-5 text-white">Admin - Portfolio</h1>

    <a href="add_project.php" class="btn btn-primary mb-3">Add New Project</a>

    <div class="row">
        <?php
        $stmt = $pdo->query('SELECT * FROM projects');
        while ($row = $stmt->fetch()) {
            echo "
            <div class='col-md-4'>
                <div class='card mb-4'>
                    <img src='{$row['image']}' class='card-img-top' alt='{$row['title']}'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['title']}</h5>
                        <a href='edit_project.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                        <a href='delete_project.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
*/
?>