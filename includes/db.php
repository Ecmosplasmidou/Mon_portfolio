<?php

try
    {
    $pdo = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 
        'root', 
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $sqlPath = __DIR__ . '/add_content.sql';

    if (file_exists($sqlPath)){
        $sql = file_get_contents($sqlPath);

        if(!empty($sql)){
            $pdo->exec($sql);
        }
    }else{
        echo "Le fichier SQL est introuvable à l'emplacement : $sqlPath";
    }

}
catch (PDOException $e){
    die('Erreur: ' . $e->getMessage());
}
