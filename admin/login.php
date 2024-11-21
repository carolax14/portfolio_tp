<?php
session_start();
include '../functions.php'; // Inclure le fichier des fonctions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (verifyLogin($username, $password)) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="../assets/css/style_admin.css">
</head>

<body>
    <div class="login-container">
        <!-- Login Form -->
        <div class="login-form">
            <h2>Connexion Admin</h2>
            <?php if (!empty($error)) : ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="forgot-password">
                    <a href="#">Mot de passe oublié ?</a>
                </div>
                <button type="submit" class="btn">Se connecter</button>
            </form>
            <!-- Lien vers index.php -->
            <div class="back-to-home">
                <a href="../index.php">Retour à l'accueil</a>
            </div>
        </div>

        <!-- Login Side -->
        <div class="login-side">
            <h2>Chaque nouveau projet</h2>
            <p>est une nouvelle aventure.</p>
            <p>Connectez-vous pour continuer.</p>
        </div>
    </div>
</body>

</html>