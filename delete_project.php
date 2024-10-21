<?php
// Inclure la connexion à la base de données
include 'includes/db.php';

// Vérifier si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Préparer et exécuter la requête pour supprimer le projet
    $stmt = $pdo->prepare('DELETE FROM projects WHERE id = ?');
    $stmt->execute([$id]);

    // Rediriger vers la page d'administration après la suppression
    header('Location: admin.php');
    exit;
} else {
    echo "ID du projet non spécifié.";
}
?>
