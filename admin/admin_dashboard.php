<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Administrateur</title>
</head>

<body>
    <h1>Bienvenue, <?php echo $_SESSION['admin']; ?> !</h1>
    <a href="logout.php">Déconnexion</a>
    <h2>Gérer les Projets</h2>
    <a href="create_project.php">Créer un projet</a>
    <h2>Liste des Projets</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom du projet</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM projects";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['title']}</td>";
            echo "<td>
                <a href='edit_project.php?id={$row['id']}'>Modifier</a> |
                <a href='delete_project.php?id={$row['id']}'>Supprimer</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>