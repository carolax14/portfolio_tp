<?php
session_start();
include '../db.php'; // Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $languages = $_POST['languages'];
    $tools = $_POST['tools'];
    $date_realization = $_POST['date_realization'];
    $cover_image = $_FILES['cover_image']['name'];

    // Upload du fichier cover_image
    $target_dir = "../assets/ppe/img/";
    $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
    move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file);

    // Insertion dans la table projects
    $sql = "INSERT INTO projects (title, description, category, languages, tools, date_realization, cover_image) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $title, $description, $category, $languages, $tools, $date_realization, $cover_image);
    $stmt->execute();

    // Récupération de l'ID du projet nouvellement créé
    $project_id = $stmt->insert_id;

    // Gestion des images associées
    if (!empty($_FILES['image_path']['name'][0])) {
        foreach ($_FILES['image_path']['name'] as $key => $image_name) {
            $image_path = $_FILES['image_path']['name'][$key];
            $image_desc = $_POST['image_description'][$key];

            // Upload des images associées
            $image_target_file = $target_dir . basename($image_path);
            move_uploaded_file($_FILES['image_path']['tmp_name'][$key], $image_target_file);

            // Insertion dans la table project_images
            $sql_images = "INSERT INTO project_images (project_id, image_path, description) 
                           VALUES (?, ?, ?)";
            $stmt_images = $conn->prepare($sql_images);
            $stmt_images->bind_param("iss", $project_id, $image_path, $image_desc);
            $stmt_images->execute();
        }
    }

    header("Location: admin_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Projet</title>
</head>

<body>
    <h2>Créer un Projet</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Titre :</label>
        <input type="text" name="title" required>
        <br><br>

        <label>Description :</label>
        <textarea name="description" rows="4" required></textarea>
        <br><br>

        <label>Catégorie :</label>
        <input type="text" name="category" required>
        <br><br>

        <label>Langages :</label>
        <input type="text" name="languages" required>
        <br><br>

        <label>Outils :</label>
        <input type="text" name="tools" required>
        <br><br>

        <label>Date de Réalisation :</label>
        <input type="date" name="date_realization" required>
        <br><br>

        <label>Image de Couverture :</label>
        <input type="file" name="cover_image" accept="image/*" required>
        <br><br>

        <h3>Images associées :</h3>
        <div id="images-container">
            <div>
                <label>Image :</label>
                <input type="file" name="image_path[]" accept="image/*">
                <br>
                <label>Description :</label>
                <textarea name="image_description[]" rows="2"></textarea>
            </div>
        </div>
        <button type="button" onclick="addImageField()">Ajouter une autre image</button>
        <br><br>

        <button type="submit">Créer</button>
    </form>

    <script>
        // Ajouter un champ pour une image supplémentaire
        function addImageField() {
            const container = document.getElementById('images-container');
            const newField = `
                <div>
                    <label>Image :</label>
                    <input type="file" name="image_path[]" accept="image/*">
                    <br>
                    <label>Description :</label>
                    <textarea name="image_description[]" rows="2"></textarea>
                </div>`;
            container.insertAdjacentHTML('beforeend', newField);
        }
    </script>
</body>

</html>