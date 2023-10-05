<?php
session_start();


session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou toute autre page de votre choix
header("Location: Loginpage.php");
exit();
?>