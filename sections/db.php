<?php
$servername = "localhost";
$username = "root";
$password = ""; // Remplace par le mot de passe si nécessaire
$dbname = "portfolio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
?>
