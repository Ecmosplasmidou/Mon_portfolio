<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $image = htmlspecialchars($_POST['image']);
    $lien_projet = isset($_POST['lien_projet']) ? htmlspecialchars($_POST['lien_projet']) : null;
    $lien_git = isset($_POST['lien_git']) ? htmlspecialchars($_POST['lien_git']) : null;
    $instagram = isset($_POST['instagram']) ? htmlspecialchars($_POST['instagram']) : null;
    $cms = isset($_POST['cms']) ? htmlspecialchars($_POST['cms']) : null;
    $project_date = htmlspecialchars($_POST['project_date']);
    $stack = htmlspecialchars($_POST['stack']);
    $carousel_photos = json_encode([$_POST['photo1'], $_POST['photo2'], $_POST['photo3']]);

    // Préparez et exécutez la requête d'insertion
    $stmt = $pdo->prepare('INSERT INTO projects (title, description, image, lien, github, instagram, cms, project_date, stack, carousel_photos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$title, $description, $image, $lien_projet, $lien_git, $instagram, $cms, $project_date, $stack, $carousel_photos]);

    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center">Add New Project</h1>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Project Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="lien_projet" class="form-label">Lien du projet</label>
            <input type="text" class="form-control" id="lien_projet" name="lien_projet">
        </div>
        <div class="mb-3">
            <label for="lien_git" class="form-label">Lien GitHub</label>
            <input type="text" class="form-control" id="lien_git" name="lien_git">
        </div>
        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="text" class="form-control" id="instagram" name="instagram">
        </div>
        <div class="mb-3">
            <label for="cms" class="form-label">CMS</label>
            <input type="text" class="form-control" id="cms" name="cms">
        </div>
        <div class="mb-3">
            <label for="project_date" class="form-label">Date de création</label>
            <input type="date" class="form-control" id="project_date" name="project_date" required>
        </div>
        <div class="mb-3">
            <label for="stack" class="form-label">Stack</label>
            <input type="text" class="form-control" id="stack" name="stack" required>
        </div>
        <div class="mb-3">
            <label for="photo1" class="form-label">Photo 1 URL</label>
            <input type="text" class="form-control" id="photo1" name="photo1">
        </div>
        <div class="mb-3">
            <label for="photo2" class="form-label">Photo 2 URL</label>
            <input type="text" class="form-control" id="photo2" name="photo2">
        </div>
        <div class="mb-3">
            <label for="photo3" class="form-label">Photo 3 URL</label>
            <input type="text" class="form-control" id="photo3" name="photo3">
        </div>
        <button type="submit" class="btn btn-primary">Add Project</button>
    </form>
</div>

<?php include 'footer.php'; ?>
</body>
</html>