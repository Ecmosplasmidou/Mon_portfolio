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
        // Décoder les URLs des photos stockées dans la colonne carousel_photos
        $carousel_photos = json_decode($project['carousel_photos'], true);

        // Vérifiez si $carousel_photos est un tableau et contient les indices nécessaires
        $photo1 = isset($carousel_photos[0]) ? htmlspecialchars($carousel_photos[0]) : '';
        $photo2 = isset($carousel_photos[1]) ? htmlspecialchars($carousel_photos[1]) : '';
        $photo3 = isset($carousel_photos[2]) ? htmlspecialchars($carousel_photos[2]) : '';
        $photo4 = isset($carousel_photos_smartphone[0]) ? htmlspecialchars($carousel_photos_smartphone[0]) : '';
        $photo5 = isset($carousel_photos_smartphone[1]) ? htmlspecialchars($carousel_photos_smartphone[1]) : '';
        $photo6 = isset($carousel_photos_smartphone[2]) ? htmlspecialchars($carousel_photos_smartphone[2]) : '';

        // Affichez les détails du projet
        echo "
        <div class='wave'></div>
        <div class='container text-white mt-4'>
            <h1 class='text-center my-5 fade-in'>{$project['title']}</h1>
            <div class='mb-4 mt-5 fade-in'>
                <h5 class='mb-5'>Date : {$project['project_date']}</h5>
                <h5 class='mb-5'>Stack : {$project['stack']}</h5>";
        if (!empty($project['cms'])) {
            echo "<h5 class='mb-5'>Cms : {$project['cms']}</h5>";
        }
            echo"
            </div>
            <div id='projectCarousel' class='carousel slide fade-in' data-ride='carousel'>
                <div class='carousel-inner'>
                    <div class='carousel-item active'>
                        <img src='$photo1' srcset='$photo1 600w, $photo4 300w' sizes='(max-width: 600px) 300px, 600px' class='d-block w-100' alt='Photo 1'>
                    </div>
                    <div class='carousel-item'>
                        <img src='$photo2' srcset='$photo2 600w, $photo5 300w' sizes='(max-width: 600px) 300px, 600px' class='d-block w-100' alt='Photo 2'>
                    </div>
                    <div class='carousel-item'>
                        <img src='$photo3' srcset='$photo3 600w, $photo6 300w' sizes='(max-width: 600px) 300px, 600px' class='d-block w-100' alt='Photo 3'>
                    </div>
                </div>
                <a class='carousel-control-prev' href='#projectCarousel' role='button' data-slide='prev'>
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='sr-only'>Previous</span>
                </a>
                <a class='carousel-control-next' href='#projectCarousel' role='button' data-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='sr-only'>Next</span>
                </a>
            </div>
            <div class='mt-5 fade-in'>
            <p>{$project['description']}</p>";
            if (!empty($project['lien'])) {
                echo "<a href='{$project['lien']}' class='btn btn-primary mr-1' target='_blank'>Link to site</a>";
            }

            // Afficher le lien GitHub s'il existe
            if (!empty($project['github'])) {
                echo "<a href='{$project['github']}' class='btn btn-secondary mr-1' target='_blank'>Link to GitHub</a>";
            }

            // Afficher le lien GitHub s'il existe
            if (!empty($project['instagram'])) {
                echo "<a href='{$project['instagram']}' class='btn btn-info mr-1' target='_blank'>Instagram</a>";
            }

            echo "
                </div>
            </div>";
    } else {
        echo "<div class='container text-white mt-4'><h1 class='text-center my-5 fade-in'>Projet non trouvé</h1></div>";
    }
} else {
    echo "<div class='container text-white mt-4'><h1 class='text-center my-5 fade-in'>Aucun projet spécifié</h1></div>";
}

include 'footer.php';
?>