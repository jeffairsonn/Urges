<?php
// Script PHP permettant de mettre en archive un evenement

// Connexion à la base de données
include('bdd.php');

// Récuperation de l'ID de l'evenement
$idevent = $_GET['id'];

echo $idevent;

// Mise ne place de la requete UPDATE 
$req = "UPDATE `evenements` SET `archive` = '1' WHERE `evenements`.`id_event` = '$idevent'";
$upd=$link->prepare($req);
$upd->execute();


header('Location: ../pages/Home/evenement.php');

?>