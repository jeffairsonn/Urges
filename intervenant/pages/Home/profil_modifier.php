<?php 
//Reprise de session
session_start();
// Récuperation de la connexion à la base de données
include('../../function/bdd.php');

// Traitement du formulaire
	// Si "ANNULER" ---> Annultion des modification et retour sur la page du profil
	if(isset($_POST['annuler']))
	{
		header('Location: profil.php');
	}
	// Si "Valider" ---> Modification en base et MAJ des variables de session
	if(isset($_POST['modifier2']))
	{
		$iduser= $_SESSION['ID'];
		// Récupération des données envoyées
		$adresse = $_POST['adresse'];
		$ville = $_POST['ville'];
		$cp = $_POST['CP'];
		$telephone = $_POST['telephone'];

		// Ajout des nouvelles informations en base
		$req_upd="
		UPDATE `profil`
		SET `adresse_profil` = '$adresse',
		`ville_profil` = '$ville',
		`CP` = '$cp',
		`telephone` = '$telephone'
		WHERE `id_user` = '$iduser'";

		$ex_upd = $link->prepare($req_upd);
		$ex_upd->execute();

		//echo $req_upd;

		// Mofification des variables de session
		$_SESSION['adresse'] = $adresse;
		$_SESSION['ville'] = $ville;
		$_SESSION['CP'] = $cp;
		$_SESSION['telephone'] = $telephone;

		header('Location: profil.php');
	}
// fin de traitement du formulaire


// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1"){  header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>
<form method=post action="?">
<p style="line-height: 150%; width: 100px;">
	Nom: <input type="text" name="nom" value="<?php echo $_SESSION['nom'] ?>" disabled="disabled">
	<br>
	Prenom: <input type="text" name="prenom" value="<?php echo $_SESSION['prenom'] ?>" disabled="disabled">
	<br>
	Classe: <input type="text" name="classe" value="<?php echo $_SESSION['id_classe'] ?>" disabled="disabled">
</p>
<hr>
<p style="line-height: 150%; width: 100px;">
	Adresse: <input type="text" name="adresse" value="<?php echo $_SESSION['adresse'] ?>">
	<br>
	Ville: <input type="text" name="ville" value="<?php echo $_SESSION['ville'] ?>">
	Code Postal: <input type="text" name="CP" value="<?php echo $_SESSION['CP'] ?>">
	<br>
	Téléphone: <input type="text" name="telephone" value="<?php echo $_SESSION['telephone'] ?>">
</p>
<hr>

<p>
		<center><input type="submit" name="modifier2" value="Valider" style="background-color: green;">&nbsp;&nbsp;&nbsp;
			<input type="submit" name="annuler" value="Annuler" style="background-color: red;"></center>
	</form>
</p>

<?php
// Mise en place du footer
include('../../function/footer.php');
?>