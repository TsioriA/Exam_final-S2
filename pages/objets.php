<?php 
include('../inc/connexion.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Objets</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets\bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets\bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include('../inc/menu.php'); ?>
    <h1>Liste des objets</h1>

    <?php
    $sql = "SELECT objet.id_objet, objet.nom_objet, categorie_objet.nom_categorie, membre.nom AS nom_membre
            FROM objet
            LEFT JOIN categorie_objet ON objet.id_categorie = categorie_objet.id_categorie
            LEFT JOIN membre ON objet.id_membre = membre.id_membre
            ORDER BY objet.id_objet";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Objet</th><th>Catégorie</th><th>Propriétaire</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_objet'] . '</td>';
            echo '<td>' . $row['nom_objet'] . '</td>';
            echo '<td>' . $row['nom_categorie'] . '</td>';
            echo '<td>' . $row['nom_membre'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Aucun objet trouvé.</p>';
    }
    ?>
</body>
</html>
