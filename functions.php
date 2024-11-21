<?php
// Inclure la connexion à la base de données
include 'db.php';

/**
 * Vérifie les identifiants d'un utilisateur
 * @param string $username
 * @param string $password
 * @return bool
 */
function verifyLogin($username, $password)
{
    global $conn;

    $passwordHash = md5($password); // Utilisez password_hash pour plus de sécurité
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $passwordHash);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
}

/**
 * Crée un projet avec ses détails et images associées
 * @param array $data
 * @param array $files
 * @return int|null ID du projet créé ou null en cas d'échec
 */
function createProject($data, $files)
{
    global $conn;

    // Préparer les données
    $title = $data['title'];
    $description = $data['description'];
    $category = $data['category'];
    $languages = $data['languages'];
    $tools = $data['tools'];
    $date_realization = $data['date_realization'];
    $cover_image = $files['cover_image']['name'];

    // Upload de l'image de couverture
    $target_dir = "../assets/img/projects/";
    $target_file = $target_dir . basename($files["cover_image"]["name"]);
    move_uploaded_file($files["cover_image"]["tmp_name"], $target_file);

    // Insertion dans la table projects
    $sql = "INSERT INTO projects (title, description, category, languages, tools, date_realization, cover_image) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $title, $description, $category, $languages, $tools, $date_realization, $cover_image);

    if ($stmt->execute()) {
        $project_id = $stmt->insert_id;

        // Gestion des images associées
        if (!empty($files['image_path']['name'][0])) {
            foreach ($files['image_path']['name'] as $key => $image_name) {
                $image_path = $files['image_path']['name'][$key];
                $image_desc = $data['image_description'][$key];

                // Upload des images associées
                $image_target_file = $target_dir . basename($image_path);
                move_uploaded_file($files['image_path']['tmp_name'][$key], $image_target_file);

                // Insertion dans la table project_images
                $sql_images = "INSERT INTO project_images (project_id, image_path, description) 
                               VALUES (?, ?, ?)";
                $stmt_images = $conn->prepare($sql_images);
                $stmt_images->bind_param("iss", $project_id, $image_path, $image_desc);
                $stmt_images->execute();
            }
        }

        return $project_id;
    } else {
        return null;
    }
}

/**
 * Supprime un projet et toutes les images associées
 * @param int $project_id
 * @return bool
 */
function deleteProject($project_id)
{
    global $conn;

    // Supprimer les images associées au projet
    $sql_images = "DELETE FROM project_images WHERE project_id = ?";
    $stmt_images = $conn->prepare($sql_images);
    $stmt_images->bind_param("i", $project_id);
    $stmt_images->execute();

    // Supprimer le projet
    $sql_project = "DELETE FROM projects WHERE id = ?";
    $stmt_project = $conn->prepare($sql_project);
    $stmt_project->bind_param("i", $project_id);
    $stmt_project->execute();

    return $stmt_project->affected_rows > 0;
}











// Fonction pour récupérer les détails d'un projet
function getProjectDetails($project_id)
{
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
function getProjectImages($project_id)
{
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
