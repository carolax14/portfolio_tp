<?php
session_start();
include '../functions.php'; // Inclure le fichier des fonctions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project_id = createProject($_POST, $_FILES);

    if ($project_id) {
        header("Location: admin_dashboard.php");
    } else {
        $error = "Erreur lors de la création du projet.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Projet</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="admin-dashboard">

        <!-- Main Content -->
        <div class="main-content">
            <div class="form-container">
                <div class="back-navigation">
                    <a href="admin_dashboard.php" class="btn-back">&larr; Retour au tableau de bord</a>
                </div>
                <h1>Créer un Projet</h1>
                <?php if (isset($error)) : ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST" action="process_create_project.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Titre du projet</label>
                        <input type="text" id="title" name="title" placeholder="Entrez le titre du projet" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Entrez la description du projet" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie</label>
                        <select id="category" name="category" required>
                            <option value="Web Development">Application Web</option>
                            <option value="Mobile App">Application Mobile</option>
                            <option value="Software">Logiciel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="languages">Langages Utilisés</label>
                        <input type="text" id="languages" name="languages" placeholder="Ex: PHP, JavaScript, Python" required>
                    </div>
                    <div class="form-group">
                        <label for="tools">Outils Utilisés</label>
                        <input type="text" id="tools" name="tools" placeholder="Ex: VS Code, Git, Docker" required>
                    </div>
                    <div class="form-group">
                        <label for="date_realization">Date de Réalisation</label>
                        <input type="date" id="date_realization" name="date_realization" required>
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Image de Couverture</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="image_path">Chemin de l'Image Supplémentaire</label>
                        <input type="file" id="image_path" name="image_path[]" accept="image/*" multiple>
                    </div>
                    <div class="form-group">
                        <label for="image_description">Description de l'Image</label>
                        <textarea id="image_description" name="image_description" placeholder="Description de l'image supplémentaire"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Créer le projet</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>