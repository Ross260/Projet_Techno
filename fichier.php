<!DOCTYPE html>
<html>
<head>
    <title>Téléversement de fichier</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<style>
.file-upload-form {
    width: fit-content;
    height: fit-content;
    display: flex;
    align-items: center;
    justify-content: center;
}
.file-upload-label input {
    display: none;
}
.file-upload-label svg {
    height: 50px;
    fill: rgb(82, 82, 82);
    margin-bottom: 20px;
}
.file-upload-label {
    cursor: pointer;
    background-color: #ddd;
    padding: 30px 70px;
    border-radius: 40px;
    border: 2px dashed rgb(82, 82, 82);
    box-shadow: 0px 0px 200px -50px rgba(0, 0, 0, 0.719);
}
.file-upload-design {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 5px;
}
.browse-button {
    background-color: rgb(82, 82, 82);
    padding: 5px 15px;
    border-radius: 10px;
    color: white;
    transition: all 0.3s;
}
.browse-button:hover {
    background-color: rgb(14, 14, 14);
}
</style>

<form class="file-upload-form" id="fileUploadForm" enctype="multipart/form-data" method="POST">

    <label for="file" class="file-upload-label">
        <div class="file-upload-design">
            <svg viewBox="0 0 640 512" height="1em">
                <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"></path>
            </svg>
            <p>or</p>
            <span class="browse-button">Sélection du fichier</span>
        </div>
        <input id="file" type="file" name="file">
    </label>

</form>

<script>
$(document).ready(function(){
    $('.browse-button').on('click', function(){
        $('#file').click();
    });

    $('#file').change(function(){
        // Lorsque le fichier a changé
        var formData = new FormData($('#fileUploadForm')[0]);

        $.ajax({
            url: '', // URL à laquelle envoyer les données (laissez vide pour envoyer au même fichier)
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                alert(response); // Afficher la réponse du serveur
            },
            error: function(xhr, status, error){
                console.error('Erreur lors du téléversement du fichier : ' + error);
            }
        });
    });
});
</script>

<?php

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projets"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $fileName = $_FILES["file"]["name"];
    $fileTmp = $_FILES["file"]["tmp_name"];
    $fileData = file_get_contents($fileTmp);

    $sql = "INSERT INTO document (titre_document, description, file_data) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $null = NULL;
    $stmt->bind_param('sss', $fileName, $description, $fileData);
    $description = 'Description du fichier';

    if ($stmt->execute()) {
        echo "Le fichier a été enregistré dans la base de données avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement du fichier dans la base de données : " . $conn->error;
    }

    $stmt->close();
}

$conn->close();

?>




</body>
</html>
