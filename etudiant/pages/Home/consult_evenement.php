
<?php 
//Reprise de session
session_start();
// Connexion à la base de données
include('../../function/bdd.php');
// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1" || $_SESSION['d1'] !== "1"){ header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>

<center><h2>Liste des évenements</h2></center><hr>

<?php 
// Recuperation de l'ID
$id = $_GET['id'];
// Mise en place de la requete
$req="SELECT * FROM `evenements` WHERE `id_event` = '$id'";
$ex=$link->prepare($req);
$ex->execute();

while($row=$ex->fetch())
{
	echo "<strong>Référence:</strong> N°".$row['id_event'];
	echo "&nbsp;&nbsp;&nbsp";
	echo "<strong>Date:</strong> ".$row['date_event'];
	echo "<br>";
	echo "<strong>Résumé de l'évenement:</strong> ".$row['resume_event']."<br>";
	echo "<p>".$row['texte_event']."</p>";
	echo "<hr>";
}

echo "<center><a href='evenement.php'>Retour à la liste des évenements</a></center>";

// Mise en place du footer
include('../../function/footer.php');
?>