<?php
$host = 'localhost'; // Nom de l'hôte
$db = 'http://localhost/phpmyadmin/index.php?route=/database/structure&db=projet_gestion&server=2'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur MySQL (souvent 'root' par défaut)
$pass = ''; // Mot de passe MySQL (souvent vide par défaut pour 'root')

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>
