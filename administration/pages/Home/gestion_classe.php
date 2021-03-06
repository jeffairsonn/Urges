
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

<center><h2>Gestion des classes</h2></center><hr>

<!-- Mise en place en-tete de tableau -->
<table width="1200">
	<tr>
		<td>Année</td>
		<td>Intitulé de la classe</td>
		<td><center>Modifier</center></td>
	</tr>

<!-- Fin mise en place en-tete de tableau -->
<!-- Mise en place formulaire -->
	<form action="modifierclasse.php" method="get">


<!-- Fin mise enplace formulaire -->
<?php
// Mise en place de la requete
$req="SELECT * FROM `classe` ORDER BY `annee` ASC";
$ex=$link->prepare($req);
$ex->execute();

// Execution de la requete
while($row=$ex->fetch())
{
	$idclasse = $row['id_classe'];
	echo "<tr>";
		echo "<td>".$row['annee']."</td>";
		echo "<td>".$row['nom_classe']."</td>";
		echo "<td><center><a href='modifierclasse.php?id=".$idclasse."'>Modifier</a></center></td>";
	echo "</tr>";
}
// fin de la requete
?>

</table><br>
</form>
<?php
// Mise en place du footer
include('../../function/footer.php');
?>