<!DOCTYPE html>
<html lang="en">
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="useful/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <header>
        <?php 
            include "navbar.php";
        ?>

        <div id="myCarousel" class="carousel slide carousel-custom" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/gestion10.jpg" style="width: 100%; height: 80vh;">
                    <div class="container">
                        <div class="carousel-caption text-center">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./image/gestion3.jpg" style="width: 100%; height: 80vh;">
                    <div class="container">
                        <div class="carousel-caption">
                            <p><a class="btn btn-lg btn-primary" href="dashboardhome.php">Gérez vos projets</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./image/gestion5.jpg" style="width: 100%; height: 80vh;">
                    <div class="container">
                        <div class="carousel-caption">
                            <p><a class="btn btn-lg btn-primary" href="">Learn more</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </header>

    <main>
        <div class="container mt-5">
            <div class="container-fluid">
                <h1>Présentation de CAPTECH</h1><br>
                <p>
                    Captech est une application de gestion de projet collaboratif conçue pour aider les équipes à planifier, 
                    organiser et gérer leur travail de manière efficace. Que vous travailliez sur des projets simples ou complexes, 
                    Captech offre les fonctionnalités nécessaires pour assurer la réussite de vos projets.
                </p>


                <br><br><br>
                <hr class="featurette-divider">
                <br><br>

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Gestion des Tâches et <span class="text-muted">Collaboration en temps réel</span>
                        </h2>
                        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                        </p>
                        
                        <a href="dashboardhome.php">
                            <div class="btn btn-primary " style="float: right; margin-right: 80px;">tableau de bord</div>
                        </a>

                    </div>
                    <div class="col-md-5 text-right">
                        <img src="./image/gestion16.png" style="width: 100%;height: 100%;">
                    </div>
                </div>
                
                <br><br><br>
                <hr class="featurette-divider">
                <br><br>

                <div class="row featurette">
                    <div class="col-md-3 text-left">
                        <img src="./image/gestion9.jpg" style="width: 100%;height: 100%;">
                    </div>
                    <div class="col-md-9 pt-4">
                        <h2 class="featurette-heading">Gestion des Ressources  <span class="text-muted">Reporting et Analytique</span>
                        </h2>
                        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.
                        </p>
                    </div>
                </div>
                                                    <!-- Gestion des Ressources :

                    Allocation des ressources et suivi de leur utilisation.
                    Prévisions de charge de travail et équilibrage des charges entre les membres de l'équipe.
                    Reporting et Analytique :

                    Rapports détaillés sur l'avancement des projets, les performances des équipes et les délais.
                    Exportation des rapports pour les réunions et les analyses. -->

            </div>
        </div>
    </main>
    

    <footer class="footer mt-5 py-3" style="background: #8a9cad;">
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
    </footer>


    <script src="useful/jquery/jquery.min.js"></script>
    <script src="useful/popper/popper.min.js"></script>
    <script src="useful/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>
</html>