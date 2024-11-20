<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'portfolio';

// Connexion
$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
