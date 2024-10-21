<?php
include 'includes/db.php';
include 'header.php';

if (isset($_GET['id'])) {
    $projectId = $_GET['id'];

    // Préparez et exécutez la requête pour obtenir les détails du projet
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
    $stmt->execute([$projectId]);
    $project = $stmt->fetch();

    if ($project) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = htmlspecialchars($_POST['title']);
            $description = $_POST['description']; // Ne pas échapper ici pour permettre l'édition de HTML
            $image = htmlspecialchars($_POST['image']);
            $lien_projet = htmlspecialchars($_POST['lien_projet']);
            $lien_git = htmlspecialchars($_POST['lien_git']);
            $project_date = htmlspecialchars($_POST['project_date']);
            $stack = htmlspecialchars($_POST['stack']);
            $carousel_photos = json_encode([$_POST['photo1'], $_POST['photo2'], $_POST['photo3']]);
            $instagram = htmlspecialchars($_POST['instagram']);
            $cms = htmlspecialchars($_POST['cms']);

            // Préparez et exécutez la requête de mise à jour
            $updateStmt = $pdo->prepare('UPDATE projects SET title = ?, description = ?, image = ?, lien = ?, github = ?, project_date = ?, stack = ?, carousel_photos = ?, instagram = ?, cms = ? WHERE id = ?');
            $updateStmt->execute([$title, $description, $image, $lien_projet, $lien_git, $project_date, $stack, $carousel_photos, $instagram, $cms, $projectId]);

            // Redirigez vers la page de détails du projet après la mise à jour
            header('Location: project_detail.php?id=' . $projectId);
            exit;
        }

        // Affichez le formulaire d'édition du projet
        $carousel_photos = json_decode($project['carousel_photos'], true);
        $photo1 = isset($carousel_photos[0]) ? htmlspecialchars($carousel_photos[0]) : '';
        $photo2 = isset($carousel_photos[1]) ? htmlspecialchars($carousel_photos[1]) : '';
        $photo3 = isset($carousel_photos[2]) ? htmlspecialchars($carousel_photos[2]) : '';

        echo "
        <div class='wave'></div>
        <div class='container text-white mt-4'>
            <h1 class='text-center my-5'>Edit Project</h1>
            <div class='row'>
                <div class='col-md-8 offset-md-2'>
                    <form method='post'>
                        <div class='mb-3'>
                            <label for='title' class='form-label text-white'>Project Title</label>
                            <input type='text' class='form-control' id='title' name='title' value='" . htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') . "' required>
                        </div>
                        <div class='mb-3'>
                            <label for='description' class='form-label text-white'>Project Description</label>
                            <textarea class='form-control' id='description' name='description' rows='3' required>" . htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8') . "</textarea>
                        </div>
                        <div class='mb-3'>
                            <label for='image' class='form-label text-white'>Image URL</label>
                            <input type='text' class='form-control' id='image' name='image' value='" . htmlspecialchars($project['image'], ENT_QUOTES, 'UTF-8') . "' required>
                        </div>
                        <div class='mb-3'>
                            <label for='lien_projet' class='form-label text-white'>Lien du projet</label>
                            <input type='text' class='form-control' id='lien_projet' name='lien_projet' value='" . htmlspecialchars($project['lien'], ENT_QUOTES, 'UTF-8') . "'>
                        </div>
                        <div class='mb-3'>
                            <label for='lien_git' class='form-label text-white'>Lien GitHub</label>
                            <input type='text' class='form-control' id='lien_git' name='lien_git' value='" . htmlspecialchars($project['github'], ENT_QUOTES, 'UTF-8') . "'>
                        </div>
                        <div class='mb-3'>
                            <label for='project_date' class='form-label text-white'>Date de création</label>
                            <input type='date' class='form-control' id='project_date' name='project_date' value='" . htmlspecialchars($project['project_date'], ENT_QUOTES, 'UTF-8') . "' required>
                        </div>
                        <div class='mb-3'>
                            <label for='stack' class='form-label text-white'>Stack</label>
                            <input type='text' class='form-control' id='stack' name='stack' value='" . htmlspecialchars($project['stack'], ENT_QUOTES, 'UTF-8') . "' required>
                        </div>
                        <div class='mb-3'>
                            <label for='photo1' class='form-label text-white'>Photo 1 URL</label>
                            <input type='text' class='form-control' id='photo1' name='photo1' value='" . htmlspecialchars($photo1, ENT_QUOTES, 'UTF-8') . "' required>
                        </div>
                        <div class='mb-3'>
                            <label for='photo2' class='form-label text-white'>Photo 2 URL</label>
                            <input type='text' class='form-control' id='photo2' name='photo2' value='" . htmlspecialchars($photo2, ENT_QUOTES, 'UTF-8') . "' required>
                        </div>
                        <div class='mb-3'>
                            <label for='photo3' class='form-label text-white'>Photo 3 URL</label>
                            <input type='text' class='form-control' id='photo3' name='photo3' value='" . htmlspecialchars($photo3, ENT_QUOTES, 'UTF-8') . "' required>
                        </div>
                        <div class='mb-3'>
                            <label for='instagram' class='form-label text-white'>Instagram</label>
                            <input type='text' class='form-control' id='instagram' name='instagram' value='" . htmlspecialchars($project['instagram'], ENT_QUOTES, 'UTF-8') . "'>
                        </div>
                        <div class='mb-3'>
                            <label for='cms' class='form-label text-white'>CMS</label>
                            <input type='text' class='form-control' id='cms' name='cms' value='" . htmlspecialchars($project['cms'], ENT_QUOTES, 'UTF-8') . "'>
                        </div>
                        <button type='submit' class='btn btn-primary'>Update Project</button>
                    </form>
                </div>
            </div>
        </div>";
    } else {
        echo "<div class='container text-white mt-4'><h1 class='text-center my-5'>Projet non trouvé</h1></div>";
    }
} else {
    echo "<div class='container text-white mt-4'><h1 class='text-center my-5'>Aucun projet spécifié</h1></div>";
}

include 'footer.php';
?>

<!-- Inclure CKEditor -->
<script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
    // Initialiser CKEditor sur le textarea
    CKEDITOR.replace('description');
</script>