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

    
    function security($data){
        $data = trim($data); // la fonction trim permet de supprimer les espaces entrer en trop pas l'utilisateur et des retour à la ligne non désirer
        $data = stripslashes($data); //la fonction stripslashes permet de supprimer les antislashs au cas où
        $data = strip_tags($data); // la fonction strip_tags va tout dabord empecher l'exécution des balises html et ensuite va les supprimé
        $data = strtolower($data);// permet de transformer la chaine de caratère en minuscule
       return $data; 
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
        .row-color-1 {
         background-color: #f8f9fa;
        }

        .row-color-2 {
         background-color: #e9ecef;
        }

        .row-color-3 {
         background-color: #dee2e6;
        }




    </style>
</head>


<?php 
            include "navbar.php";
?>


<body>

    <div class="sidebar" style="margin-top:80px;">
        <h2><i class="fas fa-chart-line"></i> Tableau de bord</h2>
        <a href="dashboardhome.php"><i class="fas fa-home"></i> Accueil</a>
        <a href="dashboardproject.php" class="active"><i class="fas fa-project-diagram"></i> Projets</a>
        <a href="dashboardtask.php"><i class="fas fa-tasks"></i> Tâches</a>
        <a href="dashboardcalendar.php"><i class="fas fa-calendar-alt"></i> Calendrier</a>
        <p><br><br>
            <?php   if(est_connecte()){
                     include_once './deconnexion.php';
            } 
        ?></p>
    </div>
    
    <div class="container">
    <div class="content">
        <h2>Projets</h2>
    </div>
    <div class="container-fluid">
        <div class="row" style="margin-left:80px;">
            <div class="col-md-6 bg-primary">
                .
            </div>
                <div class="col-md-6 bg-success">
                    .
                </div>
            </div>
            
            <div class="row" style="margin-left:80px;">
                <div class="col-md-6">
                    <h2>Liste des projets</h2>

                    <form action="dashboardproject.php" method="get">
                        <input type="submit" value="Affichier la liste des projets" name="cle" class="btn btn-primary">
                    </form>

                    <?php 
                        if (isset($_GET['cle'])) {
                            $sql = "SELECT * FROM projet "; 
                            $req = $bdd->query($sql); ?>
                       
                    <table border="1" class="table table-striped ">
                        <tr class="table-success">
                            <td><b><p>Titre</p></b></td>
                            <td> <p><b>Début</b></p></td>
                            <td> <p><b>Fin</b></p></td>
                            <td> <p><b>Status</b></p></td>
                            <td> <p><b>equipe</b></p></td>

                        </tr>

                        <?php while ($result = $req->fetch()) {  ?>
                        <tr >
                            <td style="padding: 20px;"><?php echo $result['nom_projet'] ?></td>
                            <td style="padding: 20px;"><?php echo $result['date_debut'] ?></td>
                            <td style="padding: 20px;"><?php echo $result['date_fin'] ?></td>
                            <td style="padding: 20px;"><?php echo $result['statut'] ?></td>
                            <td style="padding: 20px;"><?php echo $result['id_equipe'] ?></td>


                        </tr>

                        <?php } } ?>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                            var rows = document.querySelectorAll("table tr");
                            var colors = ['row-color-1', 'row-color-2', 'row-color-3'];
        
                            for (var i = 1; i < rows.length; i++) {
                            rows[i].classList.add(colors[(i - 1) % colors.length]);
                                }
                            });
                        </script>


                    </table>
                    
                
                    <h2>Liste des membres d'une équipe</h2>
                    <form action="dashboardproject.php" method="get">
                        <p font-size="10px">
                            <label>
                            <input type="number" placeholder="Numéro de léquipe" name="show" >
                            </label> <input type="submit" name="aff" class="btn btn-primary" value="Afficher" />
                        </p>
                        
                    </form>
                    <?php 
                        if (isset($_GET['aff'])) {
                            $num = $_GET['show'];
                            $sql = "SELECT * FROM equipe WHERE numero_equipe='$num' "; 
                            $req = $bdd->query($sql); 
                        ?>
                       
                        <table border="1" class="table table-striped ">
                            <tr class="table-success">
                                <td><p style="font-size:15px;"><b>Responsable</p></b></td>
                                <td><p style="font-size:15px;"><b>Membres</b></p></td>
                                <td><p style="font-size:15px;"><b>Intitulé</b></p></td>
                                <td><p style="font-size:15px;"><b>Numéro de l'équipe</b></p></td>
                            </tr>

                            <?php while ($result = $req->fetch()) {  ?>
                            <tr>
                                
                                <td style="padding: 20px;"><?php echo $result['responsable']; ?></td>
                                <td style="padding: 20px;"><?php echo $result['membre'] ?></td>
                                <td style="padding: 20px;"><?php echo $result['intitule'] ?></td>
                                <td style="padding: 20px;"><?php echo $result['numero_equipe'] ?></td>
                            </tr>

                            <?php } } ?>
                        </table>

                </div>
                <div class="col-md-6">
                    <div class="card mb-5 mt-2" style="background-color:lightblue;">
                        <div class="card-header">
                            <h2>Créer un Nouveau Projet</h2>
                        </div>
                        
                        <div class="card-body">
                            <form action="dashboardproject.php" method="post">
                                <div class="form-group">
                                    <?php //if($bdd){echo "connexion à la bd reussi"; }  ?>
                                    <label for="titre">Titre du Projet</label>
                                    <input type="text" class="form-control" id="titre" name="titre" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date_debut">Date de Début</label>
                                    <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                                </div>
                                <div class="form-group">
                                    <label for="date_fin">Date de Fin</label>
                                    <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <input type="text" class="form-control" id="status" name="status" required>
                                </div>
                                <div class="form-group">
                                    <label for="budget">Budget</label>
                                    <input type="number" class="form-control" id="budget" name="budget" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_equipe">Numero de l'équipe</label>
                                    <input type="number" class="form-control" id="id_equipe" name="id_equipe" required>
                                </div>

                                <button type="submit" name="send" class="btn btn-primary mt-3" >Soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- ENREGISTREMENT D'UN NOUVEAU PROJET -->
    <?php if (isset($_POST['send'])) { 
        
        $titre = security($_POST['titre']);
        $description = $_POST['description'];
        $date_debut =  $_POST['date_debut'];
        $date_fin =  $_POST['date_fin'];
        $status = $_POST['status'];
        $budget = $_POST['budget'];
        $id_equipe = $_POST['id_equipe'];



		$resultat = $bdd->exec("INSERT INTO projet VALUES(NULL, '$titre', '$description', '$date_debut', '$date_fin', '$status' , '$budget', '$id_equipe' )");

        if ($resultat) {
        ?>
        <div class="container">
            <div class="container-fluid">
            <div class="row" style="margin-left:80px;">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="alert alert-success">Produit ajouté avec succès</div>
               
        <?php
        } else {
            ?>
                    <div class="alert alert-danger">Nous avons rencontré un problème lord de l'envoie des données</div>
                </div>
            </div>
        </div>
        <?php
        }
        

    } ?>


    <!-- <footer class="footer mt-5 py-3" style="background: #8a9cad; z-index: 1000;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>À propos de nous</h5>
                    <p>Notre application de gestion de projet collaboratif aide les équipes à travailler plus efficacement ensemble.</p>
                </div>
                <div class="col-md-2">
                    <h5>Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Fonctionnalités</a></li>
                        <li><a href="#">Tarifs</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Ressources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Nous suivre</h5>
                    <div class="social-icons">
                        <a href="#" class="text-reset"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-reset"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-reset"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-reset"><i class="fab fa-instagram"></i></a>
                    </div>
                    <h5 class="mt-3">Contact</h5>
                    <p>Email: support@votreapp.com</p>
                    <p>Téléphone: +1 234 567 890</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <p>&copy; 2024 Votre App. Tous droits réservés.</p>
                    <a href="http://commentaire_notificatio">lien</a>
                </div>
            </div>
        </div>
    </footer> -->


    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
