<?php
// Script servant à la déconnexion de l'utilisateur déconnecté

// Remise à zéro des variables de session
		
		// Reprise de la session
		session_start();

		$_SESSION['nom'] = ""; // Nom du compte
		$_SESSION['connect'] = ""; // indice de connexion
// Fin de remise à zéro des variables de session


// Destruction de la session et retour à la page de connexion
session_destroy();
session_unset();
header('Location: ../../index.html');


// fin du script
?>