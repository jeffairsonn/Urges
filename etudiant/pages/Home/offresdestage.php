<?php 
//Reprise de session
session_start();
// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1" || $_SESSION['d1'] !== "1"){ header('Location: ../../../index.html'); }
// Récuperation de la connexion à la base de données
include('../../function/bdd.php');
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>

<center><h2>Offres de stages</h2></center><hr>

<?php 

// Mise en place de la requete
$req="SELECT * FROM `offres` WHERE `archive` = '0'";
$ex=$link->prepare($req);
$ex->execute();

while($row=$ex->fetch())
{
	echo "<strong>Référence:</strong> N°".$row['id_offre'];
	echo "&nbsp;&nbsp;&nbsp";
	echo "<strong>Lieu:</strong> ".$row['lieu_offre'];
	echo "&nbsp;&nbsp;&nbsp";
	echo "<strong>Durée du stage:</strong> ".$row['duree_offre'];
	echo "&nbsp;&nbsp;&nbsp";
	echo "<strong>Date de mise en ligne:</strong> ".$row['date_offre'];
	echo "<br>";
	echo "<strong>Résumé de l'offre:</strong> ".$row['resume_offre']."<br>";
	echo "<a href='#'>Voir plus</a>";
	echo "<hr>";
}

// Mise en place du footer
include('../../function/footer.php');
?>