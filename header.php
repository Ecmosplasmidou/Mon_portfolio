<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcmosDev</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="icon" sizes="192x192" href="images/favicon.png" type="image/png">
</head>

<body>
<?php
    // $currentPage = basename($_SERVER['PHP_SELF']);
    // $waveContainerClass = ($currentPage == 'home.php') ? 'wave-container' : 'wave-container-other';
    ?>
    <div class="wave-container-other">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand text-white" href="home.php">
                    <img src="images_stick/ecmosdev-logo.png" alt="Logo du site" class="img-fluid" style="max-height: 50px;">
                </a>
                <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="margin-right:210px ;">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="index.php" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My works
                            </a>
                            <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="dropdown-item" href="project_detail.php?id=1">Olympic Ticket Hub</a>
                                            <a class="dropdown-item" href="project_detail.php?id=2">Trendy-Paris</a>
                                            <a class="dropdown-item" href="project_detail.php?id=3">EcmosGotchi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contact_me.php">Contact-me</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wave"></div>
        <div class="wave"></div>