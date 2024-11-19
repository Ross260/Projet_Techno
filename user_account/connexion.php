<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../useful/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="connexion.css">
    
</head>

<body>

<?php 

    include './navbar.php';
    
?>

    <div class="cont" style="height: 700px; margin-top: 90px;">
        <div class="form sign-in">
            <h2>Bienvenue</h2>

            <form action="login.php" method="POST">
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required />
                </label>
                <label>
                    <span>Mot de passe</span>
                    <input type="password" name="password" required />
                </label>
                <p class="forgot-pass">Mot de passe oublier ?</p>
                <button type="submit" class="submit">Connexion</button>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h3>Vous n'avez pas de compte ? Veuillez vous inscrire !</h3>
                    <a href="./admin_directory/admin_login.php"><button class="btn-secondary" style="width:50px" >admin</button></a>
                </div>
                <div class="img__text m--in">
                    <h3>Si vous avez déjà un compte, il vous suffit de vous connecter.</h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Inscription</span>
                    <span class="m--in">Connexion</span>
                </div>
            </div>

            
            <!-- CREATION DE COMPTE -->
            <div class="form sign-up">
                <h2>Création de compte</h2>
                <form action="register.php" method="POST">
                    <label>
                        <span>Nom</span>
                        <input type="text" name="name" required />
                    </label>
                    <label>
                        <span>Prenom</span>
                        <input type="text" name="firstname" required />
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" required />
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password" required />
                    </label>
                   
                    
                    <button type="submit" class="submit">Inscription</button>
                </form>
            </div>
        </div>
    </div>

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


    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>

    <script src="../useful/jquery/jquery.min.js"></script>
    <script src="../useful/popper/popper.min.js"></script>
    <script src="../useful/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
</body>
</html>
