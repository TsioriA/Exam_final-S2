<?php
session_start();
include('../inc/connexion.php');

if ($_SERVER['REQUEST_METHOD']==='POST') {
  $membre = $_SESSION['id_membre'];
  $nom = mysqli_real_escape_string($conn,$_POST['nom_objet']);
  $cat = intval($_POST['id_categorie']);

  mysqli_query($conn, "INSERT INTO objet (nom_objet,id_categorie,id_membre) VALUES ('$nom',$cat,$membre)");
  $id_obj = mysqli_insert_id($conn);

  $first = true;
  foreach($_FILES['images']['tmp_name'] as $i => $tmp) {
    if ($_FILES['images']['error'][$i]===0) {
      $name = uniqid().'-'.basename($_FILES['images']['name'][$i]);
      $dest = 'uploads/'.$name;
      if (move_uploaded_file($tmp,$dest)) {
        $est = $first ? 1 : 0;
        mysqli_query($conn, "INSERT INTO images_objet (id_objet,chemin,est_principale) VALUES ($id_obj,'$dest',$est)");
        $first = false;
      }
    }
  }
  header('Location: ../pages/objets.php');
  exit();
}
?>
