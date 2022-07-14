<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title></title>
	<?php include('functions/bdd.php'); ?>
</head>
<body>
	<?php
	$table = $_GET['value'];

	$req = "DESCRIBE $table";
	$ex=$link->prepare($req);
	$ex->execute();

	echo "<center><table border=1>";
		echo "<tr><td colspan=6><center><strong>Table ".$table."</strong></center></td></tr>";
		echo "<tr>";
			echo "<td>Field</td>";
			echo "<td>Type</td>";
			echo "<td>Null</td>";
			echo "<td>Key</td>";
			echo "<td>Default</td>";
			echo "<td>Extra</td>";
		echo "</tr>";
		echo "<tr>";
			// Remplissage tableau
			while($row=$ex->fetch())
			{
				echo "<td>".$row['Field']."</td>";
				echo "<td>".$row['Type']."</td>";
				echo "<td>".$row['Null']."</td>";
				echo "<td>".$row['Key']."</td>";
				echo "<td>".$row['Default']."</td>";
				echo "<td>".$row['Extra']."</td>";
		echo "</tr>";	
			}
		echo "<tr><td colspan=6>";
			echo "<textarea rows='20' cols='110' style='background: lightblue;'></textarea>";
		echo "</td></tr>";
	echo "</table></center>";
	?>
</body>
</html>