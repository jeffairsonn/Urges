<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>Liste des comptes utilisateur</title>
	<?php include('functions/bdd.php'); ?>
</head>
<body>

<a href="index.php"><center>Retour à la page d'accueil</center></a><br>

<center><h2>Liste des comptes utilisateur</h2></center><br>

<?php 
	// Mise en place de la requete SQL
	$req = "SELECT * FROM `user`";
	$ex=$link->prepare($req);
	$ex->execute();

	echo "<fieldset>";
	echo "<center><table border=1>";
		// Haut du tableau
			echo "<tr>";
				echo "<td><strong>ID</strong></td>";
				echo "<td><strong>Login</strong></td>";
				echo "<td><strong>Mot de passe</strong></td>";
				echo "<td><strong>Adresse Mail</strong></td>";
				echo "<td><strong>Administrateur</strong></td>";
				echo "<td><strong>Eleve</strong></td>";
				echo "<td><strong>Intervenant</strong></td>";
				echo "<td><strong>Administratif</strong></td>";
			echo "</tr>";
		// Fin haut du tableau
		// Affichage du contenu du tableau
		while ($row=$ex->fetch()) 
		{
			echo "<tr>";
				echo "<td>".$row['id_user']."</td>";
				echo "<td>".$row['login']."</td>";
				echo "<td>".$row['pass']."</td>";
				echo "<td>".$row['mail']."</td>";
				echo "<td>".$row['d1']."</td>";
				echo "<td>".$row['d2']."</td>";
				echo "<td>".$row['d3']."</td>";
				echo "<td>".$row['d4']."</td>";
			echo "</tr>";
		}


		// fin affichage
	echo "</table></center>";
	echo "</fieldset>";




?>


</body>
</html>