<?php
function connexionBDD() {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'Site';

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die("Erreur de connexion : " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");
    return $conn;
}

session_start();
$conn = connexionBDD();
?>
