<?php 
include('../inc/connexion.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Membres</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include('../inc/menu.php'); ?>
    <h1>Liste des membres</h1>

    <?php
    $sql = "SELECT * FROM membre";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Nom</th><th>Email</th><th>Ville</th><th>Date naissance</th><th>Genre</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id_membre'] . '</td>';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['ville'] . '</td>';
            echo '<td>' . $row['date_naissance'] . '</td>';
            echo '<td>' . $row['genre'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Aucun membre trouvé.</p>';
    }
    ?>
</body>
</html>
