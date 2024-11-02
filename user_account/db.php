<?php
$host = 'localhost';
$dbname = 'projets';
$username = 'root';
$password = ''; // ou laisse vide si tu n'as pas défini de mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de donnée $dbname :" . $e->getMessage());
}
?>
