<?php
// Inclure la connexion à la base de données
include 'db.php';

// Fonction pour récupérer les détails d'un projet
function getProjectDetails($project_id) {
    global $conn;

    $sql = "SELECT * FROM projects WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Fonction pour récupérer les images d'un projet
function getProjectImages($project_id) {
    global $conn;

    $sql = "SELECT * FROM project_images WHERE project_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }

    return $images;
}
?>
