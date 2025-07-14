<?php 
include('../inc/connexion.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Emprunts</title>
    <link rel="stylesheet" href="../assets/css/style.css">
     <link href="../assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <?php include('../inc/menu.php'); ?>
    <h1>Liste des emprunts</h1>

    <?php
    $sql = "SELECT emprunt.id_emprunt, objet.nom_objet, membre.nom AS nom_membre, emprunt.date_emprunt, emprunt.date_retour
            FROM emprunt
            LEFT JOIN objet ON emprunt.id_objet = objet.id_objet
            LEFT JOIN membre ON emprunt.id_membre = membre.id_membre
            ORDER BY emprunt.date_emprunt DESC";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Objet</th><th>Emprunteur</th><th>Date emprunt</th><th>Date retour</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_emprunt'] . '</td>';
            echo '<td>' . $row['nom_objet'] . '</td>';
            echo '<td>' . $row['nom_membre'] . '</td>';
            echo '<td>' . $row['date_emprunt'] . '</td>';
            echo '<td>' . $row['date_retour'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Aucun emprunt trouvé.</p>';
    }
    ?>
</body>
</html>
