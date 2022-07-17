
<?php 
//Reprise de session
session_start();
// Connexion à la base de données
include('../../function/bdd.php');

// RECUPERATION INFORMATION DE LA CLASSE
$classeGetID= $_GET['id'];

$req = "SELECT * FROM `classe` WHERE `id_classe` = '$classeGetID'";
$ex=$link->prepare($req);
$ex->execute();

while($row=$ex->fetch())
{
	$nomclasse = $row['nom_classe'];
	$annee = $row['annee'];
}

// TRAITEMENT DU FORMULAIRE
// Si validation
if(isset($_POST['Valider']))
{
	// Recuperation des données entrées
	$anneevar = $_POST['annee'];
	$intitulevar = $_POST['intitule'];
	$classeGetID = $_POST['id'];

	// Mise en place et execution de la requete
	$ins="UPDATE `classe`
		SET `nom_classe` = '$intitulevar', `annee` = '$anneevar' WHERE `id_classe` = '$classeGetID'";
	$ex_ins = $link->prepare($ins);
	$ex_ins->execute();

	header('Location: gestion_classe.php');
}
// Si Annulation
if(isset($_POST['Annuler']))
{
	header('Location: gestion_classe.php');
}


// FIN DU TRAITEMENT





// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1" || $_SESSION['d3'] !== "1"){ header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>

<center><h2>Modification de classe</h2></center><hr>

<form method="post" action="?">
	<center>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	Année de la classe: 
	<select name="annee">
		<option value="1" <?php if($annee == "1"){echo "selected";} ?> >1</option>
		<option value="2" <?php if($annee == "2"){echo "selected";} ?> >2</option>
		<option value="3" <?php if($annee == "3"){echo "selected";} ?> >3</option>
		<option value="4" <?php if($annee == "4"){echo "selected";} ?> >4</option>
		<option value="5" <?php if($annee == "5"){echo "selected";} ?> >5</option>
		<option value="6" <?php if($annee == "6"){echo "selected";} ?> >6</option>
	</select>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	Intitulé de la classe:
	<?php echo "<input type='text' name='intitule' value='".$nomclasse."'></center><hr>"; ?>
	<center><input type="submit" name="Valider" value="Valider">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Annuler" value="Annuler"></center>
</form>


<?php
// Mise en place du footer
include('../../function/footer.php');
?>