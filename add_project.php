<?php include 'includes/db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $image = htmlspecialchars($_POST['image']);
    $lien_projet = htmlspecialchars($_POST['lien_projet']);
    $lien_git = htmlspecialchars($_POST['lien_git']);
    $project_date = htmlspecialchars($_POST['project_date']);
    $stack = htmlspecialchars($_POST['stack']);
    $carousel_photos = json_encode([$_POST['photo1'], $_POST['photo2'], $_POST['photo3']]);

    $stmt = $pdo->prepare('INSERT INTO projects (title, description, image) VALUES (?, ?, ?)');
    $stmt->execute([$title, $description, $image]);

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
<div class="container">
    <h1 class="text-center my-5 text-white">Add New Project</h1>

    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label text-white">Project Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-white">Project Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label text-white">Image URL</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="images/example.jpg" required>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label text-white">Lien du projet</label>
            <input type="text" class="form-control" id="lien_projet" name="lien_projet" name="lien" required>
        </div>
        <div class="mb-3">
            <label for="text" class="form-label text-white">Lien GitHub</label>
            <input type="text" class="form-control" id="lien_git" name="lien_git" name="github" required>
        </div>
        <div class='mb-3'>
            <label for='project_date' class='form-label text-white'>Date de création</label>
            <input type='date' class='form-control' id='project_date' name='project_date' name="project_add" required>
        </div>
        <div class='mb-3'>
            <label for='stack' class='form-label text-white'>Stack</label>
            <input type='text' class='form-control' id='stack' name='stack' name="stack" required>
        </div>
        <div class="mb-3">
            <label for="photo1" class="form-label text-white">Photo 1 URL</label>
            <input type="text" class="form-control" id="photo1" name="photo1" required>
        </div>
        <div class="mb-3">
            <label for="photo2" class="form-label text-white">Photo 2 URL</label>
            <input type="text" class="form-control" id="photo2" name="photo2" required>
        </div>
        <div class="mb-3">
            <label for="photo3" class="form-label text-white">Photo 3 URL</label>
            <input type="text" class="form-control" id="photo3" name="photo3" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Project</button>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
