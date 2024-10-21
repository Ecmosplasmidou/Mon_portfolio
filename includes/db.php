<?php

// try
//     {
//     $pdo = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 
//         'root', 
//         '',
//         [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
//     );

//     $sqlPath = __DIR__ . '/add_content.sql';

//     if (file_exists($sqlPath)){
//         $sql = file_get_contents($sqlPath);
//         if(!empty($sql)){
//             $pdo->exec($sql);
//         }
//     }else{
//         echo "Le fichier SQL est introuvable à l'emplacement : $sqlPath";
//     }

// }
// catch (PDOException $e){
//     die('Erreur: ' . $e->getMessage());
// }

try {
    // Récupérer les informations de connexion à partir des variables d'environnement
    $db_host = 'c3l5o0rb2a6o4l.cluster-czz5s0kz4scl.eu-west-1.rds.amazonaws.com';
    $db_name = 'd39j272s4ua1vu';
    $db_user = 'u58c0djr6rdj1d';
    $db_password = 'p2834fc8f9e453c8ac5508708edbc4813d11da793036f600d84543005b1668364';
    $db_port = '5432';

    // Créer une nouvelle connexion PDO
    $pdo = new PDO("pgsql:host=$db_host;port=$db_port;dbname=$db_name", 
        $db_user, 
        $db_password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Chemin vers le fichier SQL
    $sqlPath = __DIR__ . '/add_content.sql';

    // Vérifier si le fichier SQL existe
    if (file_exists($sqlPath)) {
        $sql = file_get_contents($sqlPath);
        if (!empty($sql)) {
            $pdo->exec($sql);
        }
    } else {
        echo "Le fichier SQL est introuvable à l'emplacement : $sqlPath";
    }
} catch (PDOException $e) {
    die('Erreur: ' . $e->getMessage());
}
