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
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">


</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="admin_dashboard.php" class="active">Dashboard</a></li>

            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="main-header">
                <h1>Bienvenue, <?php echo $_SESSION['admin']; ?> !</h1>
                <a href="logout.php" class="btn-logout">Déconnexion</a>
            </div>

            <div class="stats">
                <div class="card">
                    <h3>Nombre de Projets</h3>
                    <p>
                        <?php
                        $result = $conn->query("SELECT COUNT(*) AS total FROM projects");
                        echo $result->fetch_assoc()['total'];
                        ?>
                    </p>
                </div>
            </div>

            <div class="table-container">
                <a href="create_project.php" class="btn-create">+ Ajouter un projet</a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom du projet</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM projects";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['title']}</td>";
                            echo "<td>
                                <a href='edit_project.php?id={$row['id']}' class='btn btn-edit'>Modifier</a>
                                <a href='delete_project.php?id={$row['id']}' class='btn btn-delete'>Supprimer</a>
                              </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>