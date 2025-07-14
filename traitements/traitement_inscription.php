<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../inc/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que tous les champs sont présents
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['mdp'])) {
        $nom = mysqli_real_escape_string($conn, $_POST['nom']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mdp = $_POST['mdp']; // pas d'escape car on va hasher

        // Vérifier si l'email existe déjà
        $sql_check = "SELECT * FROM membre WHERE email = '$email'";
        $result_check = mysqli_query($conn, $sql_check);
        if ($result_check && mysqli_num_rows($result_check) > 0) {
            echo "<p style='color:red;'>Cet email est déjà utilisé.</p>";
            echo "<p><a href='../pages/inscription.php'>Retour</a></p>";
            exit;
        }

        // Hasher le mot de passe
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

        // Insérer le nouvel utilisateur
        $sql_insert = "INSERT INTO membre (nom, email, mdp) VALUES ('$nom', '$email', '$mdp_hash')";
        if (mysqli_query($conn, $sql_insert)) {
            // Inscription réussie, redirection vers login
            header('Location: ../pages/login.php?inscription=success');
            exit();
        } else {
            echo "<p style='color:red;'>Erreur lors de l'inscription.</p>";
            echo "<p><a href='../pages/inscription.php'>Retour</a></p>";
        }
    } else {
        echo "<p style='color:red;'>Veuillez remplir tous les champs.</p>";
        echo "<p><a href='../pages/inscription.php'>Retour</a></p>";
    }
} else {
    echo "<p style='color:red;'>Méthode non autorisée.</p>";
    echo "<p><a href='../pages/inscription.php'>Retour</a></p>";
}
