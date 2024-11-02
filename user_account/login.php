<?php
include 'db.php'; // Utiliser le même fichier 'db.php' pour la connexion à la base de données.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateur WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();


    
    $verif = $user['password'];
    echo $verif;
    if ($user && password_verify($verif, $password )) {
        echo "Logged in successfully!";

        // Initialiser la session et rediriger vers la page d'accueil ou autre page appropriée
        header('Location: ../index.php');
    } else {
        echo "<br> Invalid email or password!";
        // echo $user['mot_de_passe'];
        
        header('Location: ../index.php');

    }
}
?>

