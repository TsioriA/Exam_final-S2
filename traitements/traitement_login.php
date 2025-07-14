<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

include('../inc/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['mdp'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mdp = mysqli_real_escape_string($conn, $_POST['mdp']);

        $sql = "SELECT * FROM membre WHERE email = '$email' AND mdp = '$mdp'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['id_membre'] = $user['id_membre'];
            header('Location: ../pages/accueil.php');
            exit();
        } else {
            echo "<p style='color:red;'>Email ou mot de passe incorrect</p>";
            echo "<p><a href='../pages/login.php'>Retour</a></p>";
        }
    } else {
        echo "<p style='color:red;'>Champs manquants</p>";
        echo "<p><a href='../pages/login.php'>Retour</a></p>";
    }
} else {
    echo "<p style='color:red;'>Méthode non autorisée</p>";
    echo "<p><a href='../pages/login.php'>Retour</a></p>";
}
?>
