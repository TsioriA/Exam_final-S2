<?php include('../inc/connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1>Créer un compte</h1>
    <form action="../traitements/traitement_inscription.php" method="post" class="w-50 mx-auto">

        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" value ="Alice"required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value ="alice@example.com"required>
        </div>

        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" class="form-control" value ="mdp1"required>
        </div>

        <button type="submit" class="btn btn-success w-100">S’inscrire</button>
        <div class="mt-3 text-center">
            <a href="login.php" class="btn btn-link">Déjà inscrit ? Se connecter</a>
        </div>
    </form>
</body>
</html>
