
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

<center><h2>Attribution de cours</h2></center><hr>
<form method="post" action="attribution_cours3.php"> 
Selection d'un intervenant: 
<select name="prof">
	<?php
	// Mise en place de la requete de recherche des intervenants disponibles
	$req= "SELECT * FROM `profil` WHERE `id_classe` = '888'";
	$ex = $link->prepare($req);
	$ex->execute();

	while($row=$ex->fetch())
	{
		$affnom = $row['prenom_profil']." ".$row['nom_profil'];
		echo "<option value='".$row['id_profil']."'>".$affnom."</option>";
	}
	?>
</select>
Intitulé du cours: <input type="text" name="intcours"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="Valider" value="Valider">
<input type="hidden" name="ref" value="<?php echo $_POST['idclasse'];?>">
</form>
<?php
// Mise en place du footer
include('../../function/footer.php');
?>