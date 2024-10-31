<?php include 'includes/db.php'; 
include 'header.php';
?>


        <div class="wave"></div>
        <div class="container text-white mt-4">
            <h1 class="text-center my-5 fade-in">My Works</h1>
            <div class="row">
                <?php
                $stmt = $pdo->query('SELECT * FROM projects');
                while ($row = $stmt->fetch()) {
                    echo "
                    <div class='col-md-4 fade-in-text'>
                        <div class='card mb-4'>
                            <img src='{$row['image']}' class='card-img-top text-dark' alt='{$row['title']}'>
                            <div class='card-body'>
                                <h5 class='card-title text-dark'>{$row['title']}</h5>
                                <a href='project_detail.php?id={$row['id']}' class='btn btn-primary'>View Project</a>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
<?php include 'footer.php'; ?> 
</html>