<?php
session_start();
include '../functions.php'; // Inclure le fichier des fonctions

// Vérifier si l'ID du projet est passé en paramètre
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: admin_dashboard.php");
    exit;
}

$project_id = $_GET['id'];
$project = getProjectById($project_id); // Appel de la fonction pour récupérer les détails du projet

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updated = updateProject($project_id, $_POST, $_FILES); // Appel de la fonction pour mettre à jour le projet

    if ($updated) {
        header("Location: admin_dashboard.php");
    } else {
        $error = "Erreur lors de la mise à jour du projet.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Projet</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="admin-dashboard">
        <div class="main-content">
            <div class="form-container">
                <div class="back-navigation">
                    <a href="admin_dashboard.php" class="btn-back">&larr; Retour au tableau de bord</a>
                </div>
                <h1>Modifier le Projet</h1>
                <?php if (isset($error)) : ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($project['description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie :</label>
                        <select id="category" name="category" required>
                            <option value="Application Web" <?php echo $project['category'] === "Application Web" ? 'selected' : ''; ?>>Application Web</option>
                            <option value="Application Mobile" <?php echo $project['category'] === "Application Mobile" ? 'selected' : ''; ?>>Application Mobile</option>
                            <option value="Software" <?php echo $project['category'] === "Software" ? 'selected' : ''; ?>>Logiciel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="languages">Langages :</label>
                        <input type="text" id="languages" name="languages" value="<?php echo htmlspecialchars($project['languages']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tools">Outils :</label>
                        <input type="text" id="tools" name="tools" value="<?php echo htmlspecialchars($project['tools']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="date_realization">Date de Réalisation :</label>
                        <input type="date" id="date_realization" name="date_realization" value="<?php echo $project['date_realization']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Image de Couverture :</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/*">
                        <small>Image actuelle : <?php echo $project['cover_image']; ?></small>
                    </div>
                    <button type="submit" class="btn-submit">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>