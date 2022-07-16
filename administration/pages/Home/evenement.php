
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

<center><h2>Liste des évenements</h2></center><hr>

<?php 

// Mise en place de la requete
$req="SELECT * FROM `evenements` WHERE `archive` = '0'";
$ex=$link->prepare($req);
$ex->execute();

while($row=$ex->fetch())
{
	$idevent = $row['id_event'];
	echo "<strong>Référence:</strong> N°".$row['id_event'];
	echo "&nbsp;&nbsp;&nbsp";
	echo "<strong>Date de mise en ligne:</strong> ".$row['date_event'];
	echo "<br>";
	echo "<strong>Résumé de l'offre:</strong> ".$row['resume_event']."<br>";
	echo "<a href='#'>Voir plus</a>";
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<a href='../../function/archiver_event.php?id=".$idevent."'>Archiver</a>";
	echo "<hr>";
}

// Mise en place du footer
include('../../function/footer.php');
?>