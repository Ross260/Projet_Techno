<?php
header('Content-Type: application/json');
$mysqli = new mysqli('localhost', 'root', '', 'projets'); // Changez ces paramètres en fonction de votre configuration

if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$description = $data['description'];
$id_tache = $data['id_tache'];
$id_projet = $data['id_projet'];
$id_utilisateur = 1; // Remplacez par l'ID de l'utilisateur connecté

$query = "INSERT INTO commentaire (description, id_utilisateur, id_tache, id_projet) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('siii', $description, $id_utilisateur, $id_tache, $id_projet);

$response = [];
if ($stmt->execute()) {
    $response['status'] = 'success';
} else {
    $response['status'] = 'error';
    $response['error'] = $stmt->error;
}

echo json_encode($response);

$stmt->close();
$mysqli->close();
?>
