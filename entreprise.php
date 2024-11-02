<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation de l'Entreprise</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .hero-section {
            background: url('https://via.placeholder.com/1920x1080') no-repeat center center;
            background-size: cover;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }
        .services-section {
            padding: 60px 0;
        }
        .service-card {
            margin-bottom: 30px;
        }
        .contact-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }

        header{
    background: url(./image/entreprise.jpg)no-repeat 50% 50%; /* Image de fond*/
    background-size: cover; /* Fait à ce que l'image prenne toute la largeur de l'écran*/
    height: 60vh;
    border-radius: 0px 0px 20px 20px; /*dans le sens des éguilles d'une montre*/
    margin-bottom: 40px; /* crée une marge en bas de la page*/
    font-family: monospace;
}
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php 
        include "./navbar.php";
    ?>

    <!-- Hero Section -->
    <header >
        <div class="container">
            <!-- <img src="./image/entreprise.jpg" style="" alt="" srcset=""> -->
            <p>Nous fournissons des solutions innovantes pour vos besoins</p>
            <a href="#about" class="btn btn-primary btn-lg">En savoir plus</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container text-center py-5">
        <h2 >À propos de nous</h2>
        <p class="lead">Mon Entreprise est un leader dans l'industrie, offrant des produits et services de qualité supérieure pour améliorer votre expérience.</p>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section text-center">
        <div class="container">
            <h2 style="color:green;">Nos Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <h5 class="card-title" style="color:green;">Gestion de projet</h5>
                            <p class="card-text">Permet de gerer vos projet en équipe</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <h5 class="card-title" style="color:green;">Visualisation en temp reel </h5>
                            <p class="card-text">Les membres des équipes ont une vue d'ensemble sur l'ensemble de leurs projets </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <h5 class="card-title" style="color:green;">Etat d'avancement 3</h5>
                            <p class="card-text">Visualisation de l'etat d'avancement des projets</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container text-center">
            <h2>Faire un commentaire sur l'outil </h2>

            <form class="mt-4" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Nom" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="4" placeholder="Message" name="message"></textarea>
                </div>
                <button type="submit" name="comment" class="btn btn-primary btn-lg">Envoyer</button>
            </form>
        </div>
    </section>

    <?php 

        if (isset($_POST['comment'])) {
            //je me connecte à la BD

            $host = 'localhost';
            $db_name = 'projets';
            $username = 'root';
            $password = '';

            $bdd = null;

            try {
                $bdd = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "connexion reussie ! <br> \n";
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données: " . $e->getMessage());
            }


            //i saved the different informations and save it in de database
            $nom = $_POST['name'];
            $email = $_POST['email'];
            $message =  $_POST['message'];


		    $resultat = $bdd->exec("INSERT INTO commentaires VALUES(NULL, '$nom', '$email', '$message')");

            // i display them
            $req = $bdd->query("SELECT * FROM commentaires");
        }
    ?>


    <div class="container">
        <?php while ($result = $req->fetch()) {  ?>

            <fieldset>
                <legend> <i class="fa fa-user"></i> <?php echo $result['nom']; ?> </legend>
                <textarea name="" id="" cols="100" rows="5" readonly>
                    <?php echo $result['message']; ?>
                </textarea>
            </fieldset>


        <?php } ?>
    </div>





    <!-- Footer -->
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

 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
