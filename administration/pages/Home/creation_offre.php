
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

<!DOCTYPE html>
<html lang="en">

<center><h2>Création offre de stage</h2></center><hr>
<p>
<form method="post" action="?">
	Lieu de l'offre: <input type="text" name="lieu"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Durée de l'offre (mois): <input type="text" name="date">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date de publication: <input type="text" name="datepublication">
	<br><br>
	Résumé de l'offre: <br><input type="text" name="resume" maxlength="100"><br><br>
	Descriptif de l'offre: <br>
	<textarea name="texte" rows="8" cols="154"></textarea>
	<hr>
	<center><input type="submit" name="Valider" value="Valider"></center>
</form>
</p>

<?php
// TRAITEMENT DES DONNEES ENVOYES
if(isset($_POST['Valider']))
{
	// Récupération des données
	$lieu = $_POST['lieu'];
	$duree = $_POST['date'];
	$datepub = $_POST['datepublication'];
	$resume = $_POST['resume'];
	$texte = $_POST['texte'];

	// Mis en place et execution de la requete
	$req="INSERT INTO `offres` (`id_offre`, `lieu_offre`, `texte_offre`, `resume_offre`, `date_offre`, `duree_offre`, `archive`) VALUES (NULL, '$lieu', '$texte', '$resume', '$datepub', '$duree', '0')";
	$ins=$link->prepare($req);
	$ins->execute();

	// Redirection vers la page des offres
	header('Location: offredestage.php');
}

// FIN DE TRAITEMENT DES DONNEES
?>



<?php include('../../function/footer.php'); ?>