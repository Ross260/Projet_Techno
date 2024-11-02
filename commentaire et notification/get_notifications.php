<?php
header('Content-Type: application/json');
$mysqli = new mysqli('localhost', 'root', '', 'projets'); // Changez ces paramètres en fonction de votre configuration

if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$query = "SELECT * FROM notification";
$result = $mysqli->query($query);

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

echo json_encode($notifications);

$mysqli->close();
?>
