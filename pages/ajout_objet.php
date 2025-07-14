<?php include('../inc/connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>… Bootstrap & CSS …</head>
<body>
<?php include('../inc/menu.php'); ?>
<h1>Ajouter un objet</h1>
<form action="../traitements/traitement_ajout_objet.php" method="post" enctype="multipart/form-data" class="w-50 mx-auto">
  <div class="mb-3"><label>Nom :</label><input type="text" name="nom_objet" class="form-control" required></div>
  <div class="mb-3"><label>Catégorie :</label>
    <select name="id_categorie" class="form-control" required>
      <?php
        $cats = mysqli_query($conn, "SELECT * FROM categorie_objet");
        while ($c = mysqli_fetch_assoc($cats)) echo "<option value='{$c['id_categorie']}'>{$c['nom_categorie']}</option>";
      ?>
    </select>
  </div>
  <div class="mb-3"><label>Images :</label><input type="file" name="images[]" accept="image/*" multiple class="form-control"></div>
  <button type="submit" class="btn btn-success w-100">Ajouter</button>
</form>
</body>
</html>
