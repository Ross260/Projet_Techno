<?php 
session_start();
unset($_SESSION['connecte']);
session_destroy();

header('Location: ./index.php');

#fichier de déconexion de l'administrateur