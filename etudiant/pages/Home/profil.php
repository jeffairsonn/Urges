
<?php 
//Reprise de session
session_start();
// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1"){  header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>