<?php
// Ouverture d'une session -> pour passage de certaines informations par variables de session
@session_start();
// fin ouvetrture de session

// Connexion à la base de données - utilisation des fonctions PDO
$link = new PDO('mysql:host=localhost;dbname=urges', "root", "root", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// fin de connexion à la base de données

// Récuperation des variables
$login = $_POST['login'];
$pass = $_POST['pass'];

// Passage du mot de passe entré en MD5 
$passMD5 = md5($pass);

// Verification authentification utilisateur
$ver = "SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$passMD5'";
$ex_ver = $link->prepare($ver);
$ex_ver->execute();

// variable de verification de l'entrée
$verification = $ex_ver->rowCount();


// Si présence dans la base
if($verification == 1)
{
	while($row=$ex_ver->fetch())
	{
		// Mise en place des variables de session
		$_SESSION['nom'] = $row['login']; // Nom du compte
		$_SESSION['connect'] = "1"; // Statut de connexion

		// RAZ variables de session droits
		$_SESSION['d1'] = "0";
		$_SESSION['d2'] = "0";
		$_SESSION['d3'] = "0";
		$_SESSION['d4'] = "0";
		// Fin de mise en place des variables de session

		// Verification des droits utilisateurs
		if($row['d1'] == 1) // Si Eleve -> redirection vers plateforme élève
		{
			$_SESSION['d1'] = "1";
			header('Location: ../etudiant/pages/Home/index.php');
		}
		if($row['d2'] == 1) // Si intervenant -> redirection vers plateforme intervenant
		{
			$_SESSION['d2'] = "1";
			header('Location: ../intervenant/pages/Home/index.php');
		}
		if($row['d3'] == 1) // Si Administratif -> redirection vers plateforme administrativ
		{
			$_SESSION['d3'] = "1";
			header('Location: ../administration/pages/Home/index.php');
		}
		if($row['d4'] == 1) //Si root -> redirection vers plateforme Root
		{
			$_SESSION['d4'] = "1";
		}
	}
}
else // Si aucunes entrées -> retour à la page de connexion
{
	// Fermeture de session
	session_destroy();
	session_unset();
	// Redirection vers la page de connexion
	header('Location: ../index.html');
}



?>