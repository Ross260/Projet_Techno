<?php

function est_connecte(): bool {
    if (session_status() === PHP_SESSION_NONE ) {
       session_start();  //si la session n'est pas debuter, faire un session_start() pour démarrer la session
    }
    return !empty($_SESSION['connecte']);
     //si l'utilisateur n'est pas connecté ca retourne vrai sinon ca retourne faux
     // si la session n'est pas vide, retourne vrai si non faux
}

function user_connected() {
   if (!est_connecte()) {
      header('Location: ./user_account/admin_directory/admin_login.php'); //si l'utilisateur n'est pas connecte le rediriger vers cette page
      exit();
  }
  else{
   return 1;
  }
}