<?php 
require_once './function.php';   // entrer dans le fichier function.php
if ( user_connected() ) {     // vérifier si l'utilisateur est connecté
    $host = 'localhost';
    $db_name = 'projets';
    $username = 'root';
    $password = '';

    $bdd = null;

    try {
        $bdd = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connexion reussie ! <br> \n";
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="useful/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }

        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 30px;

        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar .active{
            color:aqua;
        }

    </style>
</head>
<body>
    
    <div class="sidebar">
        <h2><i class="fas fa-chart-line"></i> Tableau de bord</h2>
        <a href="dashboardhome.php" class="active"><i class="fas fa-home"></i> Accueil</a>
        <a href="dashboardproject.php"><i class="fas fa-project-diagram"></i> Projets</a>
        <a href="dashboardtask.php"><i class="fas fa-tasks"></i> Tâches</a>
        <a href="dashboardcalendar.php"><i class="fas fa-calendar-alt"></i> Calendrier</a>
        <p><br><br>
            <?php   if(est_connecte()){
                     include_once './deconnexion.php';
            } 
        ?></p>
    </div>

<<<<<<< HEAD



    <main role="main" style="margin-left:250Px; margin-bottom:700Px">
        
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Tableau de bord</h1>
                <p>
                    Le tableau de bord est votre centre de commande centralisé pour gérer efficacement vos projets et vos tâches.
                    Il vous offre une vue d'ensemble de vos activités,
                    vous permettant de suivre les progrès, de gérer les délais et de collaborer avec votre équipe en temps réel.
                </p>
                <a href="index.php">
                    <div class="btn btn-primary">Retour vers l'accueil du site</div>
                </a>
            </div>
        </div>
        
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
            <div class="col-md-4">
                <u><h2>Vos projets</h2></u>
                <p>Ayez une vue d'ensemble sur vos projets, Accédez rapidement à l'état actuel de tous vos projets, avec des indicateurs visuels clairs sur les délais et les priorités.</p>
                <p><a class="btn btn-primary" href="dashboardproject.php" role="button">Details »</a></p>
            </div>
            <div class="col-md-4">
                <u><h2>Gestion des tâches</h2></u>
                <p>Créez, assignez et suivez les tâches de manière intuitive pour vous assurer que rien ne passe à travers les mailles du filet.</p>
                <p><a class="btn btn-primary" href="dashboardtask.php" role="button">Details »</a></p>
            </div>
            <div class="col-md-4">
                <u><h2>Calendrier intégré</h2></u>
                <p>Planifiez et visualisez toutes vos échéances et réunions en un coup d'œil.</p>
                <p><a class="btn btn-primary" href="dashboardcalendar.php" role="button">Details »</a></p>
            </div>
            </div>
        
            <hr>
        
        </div> <!-- /container -->
        
    </main>



    <script src="useful/jquery/jquery.min.js"></script>
    <script src="useful/popper/popper.min.js"></script>
    <script src="useful/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
