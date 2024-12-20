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
        $carousel_photos_smartphone = json_decode($project['carousel_photos_smartphone'], true);

        // Vérifiez si $carousel_photos est un tableau et contient les indices nécessaires
        $photo1 = isset($carousel_photos[0]) ? htmlspecialchars($carousel_photos[0]) : '';
        $photo2 = isset($carousel_photos[1]) ? htmlspecialchars($carousel_photos[1]) : '';
        $photo3 = isset($carousel_photos[2]) ? htmlspecialchars($carousel_photos[2]) : '';
        $photo4 = isset($carousel_photos_smartphone[0]) && !empty($carousel_photos_smartphone[0]) ? htmlspecialchars($carousel_photos_smartphone[0]) : $photo1;
        $photo5 = isset($carousel_photos_smartphone[1]) && !empty($carousel_photos_smartphone[1]) ? htmlspecialchars($carousel_photos_smartphone[1]) : $photo2;
        $photo6 = isset($carousel_photos_smartphone[2]) && !empty($carousel_photos_smartphone[2]) ? htmlspecialchars($carousel_photos_smartphone[2]) : $photo3;

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
                    <!-- Image 1 -->
                    <div class='carousel-item active'>
                        <picture>
                            <!-- Image pour grand écran -->
                            <source media='(min-width: 768px)' srcset='$photo1'>
                            <!-- Image pour petit écran -->
                            <img src='$photo4' class='d-block w-100' alt='Image 1'>
                        </picture>
                    </div>
                    <!-- Image 2 -->
                    <div class='carousel-item'>
                        <picture>
                            <source media='(min-width: 768px)' srcset='$photo2'>
                            <img src='$photo5' class='d-block w-100' alt='Image 2'>
                        </picture>
                    </div>
                    <!-- Image 3 -->
                    <div class='carousel-item'>
                        <picture>
                            <source media='(min-width: 768px)' srcset='$photo3'>
                            <img src='$photo6' class='d-block w-100' alt='Image 3'>
                        </picture>
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

            // Afficher le lien Instagram s'il existe
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
