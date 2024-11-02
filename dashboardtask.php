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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<?php 
            include "navbar.php";
        ?>


<body>

    <div class="sidebar" style="margin-top:80px;">
        <h2><i class="fas fa-chart-line"></i> Tableau de bord</h2>
        <a href="dashboardhome.php"><i class="fas fa-home"></i> Accueil</a>
        <a href="dashboardproject.php"><i class="fas fa-project-diagram"></i> Projets</a>
        <a href="dashboardtask.php" class="active"><i class="fas fa-tasks"></i> Tâches</a>
        <a href="dashboardcalendar.php"><i class="fas fa-calendar-alt"></i> Calendrier</a>
        <p><br><br>
            <?php   if(est_connecte()){
                     include_once './deconnexion.php';
            } 
        ?></p>
    </div>
         <div class="content">
            <h2>Tâches</h2>
            <canvas id="projectChart" width="80" height="40"></canvas>

        </div>

    <div class="container">
        <div class="container-fluid">
            <div class="row" style="margin-left:80px;">
                <div class="col-md-6 bg-warning">
                    .
                </div>
                <div class="col-md-6 bg-secondary">
                    .
                </div>
            </div>

            <div class="row" style="margin-left:80px;">
                <div class="col-md-6 mt-4 ">
                    <p>Recherche d'un projet</p>

                    <form method="GET" id="monform" name="form1" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <p font-size="10px">
                            <label>
                            <input type="text" placeholder="Nom du projet" name="cle" value="<?php if(isset($_GET['cle'])) echo $_GET['cle']  ?>">
                            </label> <input type="submit" name="bouton" class="btn btn-primary" value="Envoyer" />
                        </p>

                        <p font-size="10px">
                            <label>
                            <input type="text" placeholder="status" name="mod" >
                            </label> <input type="submit" name="modif_button" class="btn btn-primary" value="Modifier" />
                        </p>


                    </form>
                    
                    <!-- Recherche d'un projet -->
                       <?php 
                            if (isset($_GET['bouton'])) {
                            $name_project = $_GET['cle'];
                            $sql = "SELECT * FROM projet WHERE nom_projet = '$name_project' "; 
                            $req = $bdd->query($sql); 
                        ?>
                       
                        <table border="1" class="table table-striped ">
                            <tr class="table-success">
                                <td><b><p>Titre</p></b></td>
                                <td> <p><b>Début</b></p></td>
                                <td> <p><b>Fin</b></p></td>
                                <td> <p><b>Status</b></p></td>
                                <td> <p><b>equipe</b></p></td>

                            </tr>

                            <?php while ($result = $req->fetch()) {  ?>
                            <tr>                                
                                <td style="padding: 20px;"><?php echo $result['nom_projet']; $modif_name = $result['nom_projet']; ?></td>
                                <td style="padding: 20px;"><?php echo $result['date_debut'] ?></td>
                                <td style="padding: 20px;"><?php echo $result['date_fin'] ?></td>
                                <td style="padding: 20px;"><?php echo $result['statut'] ?></td>
                                <td style="padding: 20px;"><?php echo $result['id_equipe'] ?></td>
                            </tr>


                                     <?php
                                    // Récupération des données de la base de données
                                    $sql = "SELECT nom_projet FROM projet";
                                    $req = $bdd->query($sql);

                                    // Initialisation des tableaux pour stocker les libellés et les données d'avancement
                                    $labels = [];
                                    $data = [];

                                    // Boucle à travers les résultats de la requête et stockage des données dans les tableaux
                                    while ($result = $req->fetch()) {
                                        $labels[] = $result['nom_projet'];
                                        $data[] = $result['nom_projet'];
                                    }

                                    // Fermeture de la requête
                                    $req->closeCursor();

                                    // Création de l'objet de configuration pour le diagramme
                                    $chartData = [
                                        'labels' => $labels,
                                        'datasets' => [
                                            [
                                                'label' => 'projet',
                                                'data' => $data,
                                                'backgroundColor' => [
                                                    'rgba(255, 99, 132, 0.2)', // Couleur de fond
                                                    // Ajoutez d'autres couleurs si vous avez plus de données
                                                ],
                                                'borderColor' => [
                                                    'rgba(255, 99, 132, 1)', // Couleur de la bordure
                                                    // Ajoutez d'autres couleurs si vous avez plus de données
                                                ],
                                                'borderWidth' => 2
                                            ]
                                        ]
                                    ];
                                    ?>




                                                                                                

                            <?php } } ?>
                        </table>

                    
                    <!-- Modification du status -->
                      <?php 
                            if (isset($_GET['modif_button'])) {
                                $name_project = $_GET['cle'];
                                $modif = $_GET['mod'];
                                $sql = "UPDATE projet SET statut = '$modif' WHERE nom_projet = '$name_project' ";

                                $req = $bdd->query($sql);
                            if ($req) {
                                ?>
                                    <div class="alert alert-success">Status modifier avec succès</div>
                                       
                                <?php
                            } else {
                                ?>
                                    <div class="alert alert-danger">Nous avons rencontré un problème lord de l'envoie des données</div>
                                    
                                <?php
                            }
                         }
                        ?> 


                        <?php 
                            include "fichier.php";
                        ?>
                            


                </div>

                                    <script>
                        var ctx = document.getElementById('projectChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar', // Vous pouvez choisir le type de diagramme ici
                            data: <?php echo json_encode($chartData); ?>,
                            options: {
                                // Options du diagramme
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });

                        // Modifier les dimensions du canvas pour augmenter la taille du diagramme
                        var canvas = document.getElementById('projectChart');
                        canvas.width = 800; // Nouvelle largeur
                        canvas.height = 400; // Nouvelle hauteur
                    </script>






                              

                <div class="col-md-6 mt-4" style="background-color:gray;">

                    <div class="card-header">
                            <h2>Enregistrement des équipes</h2>
                    </div>
                        
                    <div class="card-body">
                    <form action="dashboardtask.php" method="post" >
                        <div class="form-group">
                            <?php //if($bdd){echo "connexion à la bd reussi"; }  ?>
                            <label for="responsable">Responsable du Projet</label>
                            <input type="text" class="form-control" id="responsable" name="responsable" required>
                        </div>
                        <div class="form-group">
                            <label for="membres">Membres</label>
                            <input type="text" class="form-control" id="membres" name="membres" placeholder="séparer les noms par des virgules" required>
                        </div>
                        <div class="form-group">
                            <label for="intitule">intitulé de l'équipe</label>
                            <input type="text" class="form-control" id="intitule" name="intitule" required>
                        </div>
                        <div class="form-group">
                            <label for="numero_equipe">Numéro de l'équipe</label>
                            <input type="number" class="form-control" id="numero_equipe" name="numero_equipe" required>
                        </div>

                        <button type="submit" name="send" class="btn btn-primary mt-3" >Soumettre</button>
                    </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="container">







<!-- ENREGISTREMENT D'UNE NOUVELLE EQUIPE -->
<?php 


    if (isset($_POST['send'])) { 
        
        $responsable = security($_POST['responsable']);
        $membres = $_POST['membres'];
        $intitule =  $_POST['intitule'];
        $numero_equipe =  $_POST['numero_equipe'];


		$resultat = $bdd->exec("INSERT INTO equipe VALUES(NULL, '$responsable', '$membres', '$intitule', '$numero_equipe')");

        if ($resultat) {
        ?>
        
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



</body>
</html>