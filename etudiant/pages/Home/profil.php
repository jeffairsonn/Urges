
<?php 
//Reprise de session
session_start();
// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1"){  header('Location: ../../../index.html'); }
// Récuperation de la connexion à la base de données
include('../../function/bdd.php');
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');


?>

<p style="line-height: 150%; width: 100px;">
	Nom: <input type="text" name="nom" value="<?php echo $_SESSION['nom'] ?>" disabled="disabled">
	<br>
	Prenom: <input type="text" name="nom" value="<?php echo $_SESSION['prenom'] ?>" disabled="disabled">
	<br>
	Classe: <input type="text" name="nom" value="<?php echo $_SESSION['id_classe'] ?>" disabled="disabled">
</p>
<hr>
<p style="line-height: 150%; width: 100px;">
	Adresse: <input type="text" name="nom" value="<?php echo $_SESSION['adresse'] ?>" disabled="disabled">
	<br>
	Ville: <input type="text" name="nom" value="<?php echo $_SESSION['ville'] ?>" disabled="disabled">
	Code Postal: <input type="text" name="nom" value="<?php echo $_SESSION['CP'] ?>" disabled="disabled">
	<br>
	Téléphone: <input type="text" name="nom" value="<?php echo $_SESSION['telephone'] ?>" disabled="disabled">
</p>
<hr>
<p>
	<form method=post action="profil_modifier.php">
		<center><input type="submit" name="modifier" value="Modifier les informations"></center>
	</form>
	
</p>

<?php
// Mise en place du footer
include('../../function/footer.php');
?>