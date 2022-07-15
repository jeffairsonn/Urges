<?php
// Script PHP permettant de mettre en archive une offre

// Connexion à la base de données
include('bdd.php');

// Récuperation de l'ID de l'evenement
$idoffre = $_GET['id'];

echo $idevent;

// Mise ne place de la requete UPDATE 
$req = "UPDATE `offres` SET `archive` = '1' WHERE `offres`.`id_offre` = '$idoffre'";
$upd=$link->prepare($req);
$upd->execute();


header('Location: ../pages/Home/offredestage.php');

?>