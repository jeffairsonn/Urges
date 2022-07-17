<?php
// Connexion à la base de données
include('../../function/bdd.php');

// Insertion des données d'un nouveau cours en base pour une classe

$idclasse = $_POST['ref'];
$idprof = $_POST['prof'];
$intitulecours = $_POST['intcours'];

echo $idclasse."   ".$idprof."   ".$intitulecours;

// Mise en place de la requete
$ins = "INSERT INTO `cours` (`id_cours`, `nom_cours`, `id_intervenant`, `id_classe`) VALUES (NULL, '$intitulecours', '$idprof', '$idclasse')";
$ex=$link->prepare($ins);
$ex->execute();

header('Location: attribuer_cours.php');

?>