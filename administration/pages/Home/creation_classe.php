
<?php 
//Reprise de session
session_start();
// Connexion à la base de données
include('../../function/bdd.php');

// Traitement du formulaire
if(isset($_POST['Valider']))
{
	$annee = $_POST['annee'];
	$intitule = $_POST['intitule'];

	$ins = "INSERT INTO `classe` (`id_classe`, `nom_classe`, `annee`) VALUES (NULL, '$intitule', '$annee')";
	$ex=$link->prepare($ins);
	$ex->execute();

	header('Location: gestion_classe.php');
}

// Fin  du traitement du formulaire

// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1" || $_SESSION['d3'] !== "1"){ header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>

<center><h2>Creer une nouvelle classe</h2></center><hr>

<form method="post" action="?">
<center>	Année de la classe: 
	<select name="annee">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
	</select>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	Intitulé: <input type="text" name="intitule"></center>
	<hr>
	<center><input type="submit" name="Valider" value="Valider"></center>
</form>

<?php
// Mise en place du footer
include('../../function/footer.php');
?>