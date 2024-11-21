<?php
session_start();
include '../functions.php'; // Inclure les fonctions globales

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

// Vérifier si un ID de projet est passé dans l'URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de projet invalide.");
}

$project_id = (int)$_GET['id'];

// Supprimer le projet
if (deleteProject($project_id)) {
    header("Location: admin_dashboard.php?message=Projet supprimé avec succès.");
} else {
    die("Erreur : Impossible de supprimer le projet.");
}
