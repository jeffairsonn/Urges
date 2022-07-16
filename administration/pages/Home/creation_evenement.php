
<?php 
//Reprise de session
session_start();
// Connexion à la base de données
include('../../function/bdd.php');
// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1" || $_SESSION['d3'] !== "1"){ header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>

<center><h2>Création d'un évenement</h2></center><hr>

<form method="post" action="?">
	Date: <input type="text" name="date"><br><br>
	Résumé de l'évenement: <input type="text" name="resume" maxlength="100"><br><br>
	Descriptif de l'évenement:
		<textarea name="texte" rows="8" cols="154" maxlength="500"></textarea>
	<hr>
	<center><input type="submit" name="Valider" value="Valider"></center>


</form>

<?php

if(isset($_POST['Valider']))
{
	// Récuperation de l'entrée utilisateur
	$date = $_POST['date'];
	$resume = $_POST['resume'];
	$texte = $_POST['texte'];
	$archive = "0";

	// Insertient en base de données
	$req = "INSERT INTO `evenements` (`id_event`, `texte_event`, `resume_event`, `date_event`, `archive`) VALUES (NULL, '$texte', '$resume', '$date', '$archive')";
	$ins=$link->prepare($req);
	$ins->execute();

	header('Location: evenement.php');
}



 include('../../function/footer.php'); ?>