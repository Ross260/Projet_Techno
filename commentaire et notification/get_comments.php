<?php
header('Content-Type: application/json');
$mysqli = new mysqli('localhost', 'root', '', 'projets'); // Changez ces paramètres en fonction de votre configuration

if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$id_tache = $_GET['id_tache'];
$id_projet = $_GET['id_projet'];

$query = "SELECT c.*, u.nom, u.prenom FROM commentaire c JOIN utilisateur u ON c.id_utilisateur = u.id_utilisateur WHERE c.id_tache = ? AND c.id_projet = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ii', $id_tache, $id_projet);
$stmt->execute();
$result = $stmt->get_result();

$comments = [];
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}

echo json_encode($comments);

$stmt->close();
$mysqli->close();
?>
