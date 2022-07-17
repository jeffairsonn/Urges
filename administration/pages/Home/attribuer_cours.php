
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

<form method="post" action="attribution_cours2.php">
	Sélection de la classe: <select name="idclasse">
		<?php
		// Mise en place de la liste de selection
			$req="SELECT * FROM `classe` WHERE `id_classe` != '777' AND `id_classe` != '888' AND `id_classe` != '999'";
			$ex=$link->prepare($req);
			$ex->execute();

			while($row=$ex->fetch())
			{
				$affichageclasse = $row['annee']." - ".$row['nom_classe'];
				echo "<option value=".$row['id_classe'].">".$affichageclasse."</option>";
			}
		?>
	</select>
	<input type="submit" name="Valider" value="Valider">
</form>

<?php
// Mise en place du footer
include('../../function/footer.php');
?>