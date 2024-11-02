<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifs</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .pricing-header {
            max-width: 700px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            margin-bottom: 20px;
        }
        .pricing-card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e5e5e5;
        }
        .btn-primary {
            border-radius: 20px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php 
        include "./navbar.php";
    ?>

    <!-- Pricing Section -->
    <section id="pricing" class="text-center py-5 mt-5">
        <div class="container">
            <div class="pricing-header mx-auto text-center mb-5">
                <h1 class="display-4">Nos Tarifs</h1>
                <p class="lead">Choisissez le plan qui convient le mieux à vos besoins.</p>
            </div>
            <div class="row">
                <!-- Basic Plan -->
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <div class="card-header pricing-card-header">
                            <h4 class="my-0 font-weight-normal">Basic</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$10 <small class="text-muted">/ mois</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>10 utilisateurs inclus</li>
                                <li>2 GB de stockage</li>
                                <li>Support par email</li>
                                <li>Accès au centre d'aide</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">S'inscrire gratuitement</button>
                        </div>
                    </div>
                </div>
                <!-- Pro Plan -->
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <div class="card-header pricing-card-header">
                            <h4 class="my-0 font-weight-normal">Pro</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$30 <small class="text-muted">/ mois</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>20 utilisateurs inclus</li>
                                <li>10 GB de stockage</li>
                                <li>Support prioritaire</li>
                                <li>Accès au centre d'aide</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Commencer</button>
                        </div>
                    </div>
                </div>
                <!-- Enterprise Plan -->
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <div class="card-header pricing-card-header">
                            <h4 class="my-0 font-weight-normal">Entreprise</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$50 <small class="text-muted">/ mois</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>50 utilisateurs inclus</li>
                                <li>30 GB de stockage</li>
                                <li>Support téléphonique</li>
                                <li>Accès au centre d'aide</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Contactez-nous</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
