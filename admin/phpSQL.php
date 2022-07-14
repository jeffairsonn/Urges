<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<title>phpSQL</title>
	<?php include('functions/bdd.php'); ?>
</head>
<body>
	<center><h2>PHP SQL</h2></center>
	<p>Faire une page d'interrogation de la base de données (entrée req SQL, req SQL utilisée souvent ...)</p>

	<!-- Tableau de requettes -->
	<center><form method="post"><table border="1">
		<tr>
			<td>
				<?php
				$reqtable = "SHOW TABLES";
				$extable = $link->prepare($reqtable);
				$extable->execute();

				while($rowtable = $extable->fetch())
				{
					echo "<a href=viewSQL.php?value=".$rowtable['Tables_in_urges']." target='_blank'>".$rowtable['Tables_in_urges']."</a>";
					echo "&nbsp;&nbsp;&nbsp;";
				}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<textarea name="req" rows="10" cols="110" style="background: yellow;">
					
				</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<center><input type="submit" name="Executer" value="Executer"></center>
			</td>
		</tr>
	</table></form></center>

<?php
// execution script PHP
if(isset($_POST['Executer']))
{
	echo $_POST['req'];
}
?>



</body>
</html>