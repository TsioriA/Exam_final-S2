<?php include('../inc/connexion.php'); ?>
<!DOCTYPE html><html lang="fr"><head>…</head><body>
<?php include('../inc/menu.php'); ?>
<?php
$id = intval($_GET['id'] ?? 0);
$obj = mysqli_fetch_assoc(mysqli_query($conn,"SELECT o.*, c.nom_categorie FROM objet o JOIN categorie_objet c ON o.id_categorie=c.id_categorie WHERE o.id_objet=$id"));
$imgs = mysqli_query($conn,"SELECT * FROM images_objet WHERE id_objet=$id");
$emprs = mysqli_query($conn,"SELECT e.*, m.nom AS membre FROM emprunt e JOIN membre m ON e.id_membre=m.id_membre WHERE e.id_objet=$id ORDER BY e.date_emprunt DESC");
?>
<h1><?= htmlspecialchars($obj['nom_objet']) ?></h1>
<div class="d-flex">
  <div>
    <?php while($img = mysqli_fetch_assoc($imgs)): ?>
      <img src="<?= $img['chemin'] ?>" class="img-thumbnail m-1" style="width:150px">
    <?php endwhile; ?>
  </div>
  <div class="ms-4">
    <p><strong>Catégorie :</strong> <?= htmlspecialchars($obj['nom_categorie']) ?></p>
    <h3>Historique des emprunts :</h3>
    <?php if(mysqli_num_rows($emprs)): ?>
      <ul>
        <?php while($e=mysqli_fetch_assoc($emprs)): ?>
          <li><?= "{$e['membre']} | emprunté le {$e['date_emprunt']}" . ($e['date_retour'] ? " - retourné le {$e['date_retour']}" : " (non retourné)") ?></li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <p>Aucun emprunt enregistré.</p>
    <?php endif; ?>
  </div>
</div>
</body></html>
