<?php
// Inclure la connexion à la base de données
include 'includes/db.php';

// Fonction pour récupérer tous les projets
function getAllProjects($pdo) {
    $stmt = $pdo->query('SELECT * FROM projects ORDER BY created_at DESC');
    return $stmt->fetchAll();
}

// Fonction pour récupérer un projet par ID
function getProjectById($pdo, $id) {
    $stmt = $pdo->prepare('SELECT * FROM projects WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Fonction pour ajouter un projet
function addProject($pdo, $title, $description, $image) {
    $stmt = $pdo->prepare('INSERT INTO projects (title, description, image) VALUES (?, ?, ?)');
    $stmt->execute([$title, $description, $image]);
}

// Fonction pour mettre à jour un projet
function updateProject($pdo, $id, $title, $description, $image) {
    $stmt = $pdo->prepare('UPDATE projects SET title = ?, description = ?, image = ? WHERE id = ?');
    $stmt->execute([$title, $description, $image, $id]);
}

// Fonction pour supprimer un projet
function deleteProject($pdo, $id) {
    $stmt = $pdo->prepare('DELETE FROM projects WHERE id = ?');
    $stmt->execute([$id]);
}
?>
