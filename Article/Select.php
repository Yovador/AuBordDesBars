<?php include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 
$primKey = "NumArt";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<table style="width:50%">
		<tr>
			<th>Num Art</th>
			<th>Date création</th>
		    <th>Titre</th>
		    <th>Chapo</th>
		    <th>Accroche</th>
		    <th>Paragraphe 1</th>
		    <th>Sous titre 1</th>
		    <th>Paragraphe 2</th>
		    <th>Sous Titre 2</th>
		    <th>Paragraphe 3</th>
		    <th>Conclusion</th>
		    <th>Lien Photo</th>
		    <th>Likes</th>
		    <th>Angle</th>
		    <th>Theme</th>
		    <th>Langue</th>
		    <th>Voir</th>
		    <th>Modifier</th>
		    <th>Supprimer</th>
		 </tr>

	<?php 


		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		$request = $DB->query('SELECT * FROM ARTICLE');
		while ($table = $request->fetch(PDO::FETCH_ASSOC) ) {
	?>		
			  <tr>
			  	<?php foreach ($table as $key => $value) {
			  		?>
			  		<td > 
			  			<!--Ligne de style a supprimer -->	
			  			<div style="overflow: hidden; height: 5rem; width: 5rem; margin-top: 1rem ; margin-left: 0.5rem; text-align: center;"> 
			  			<?php
			  			if ($key == "NumLang") {
			  				echo GetOneEntry("Lib1Lang", "LANGUE", "NumLang",$table['NumLang']);
			  			}
			  			elseif ($key == "NumThem") {
			  				echo GetOneEntry("LibThem", "THEMATIQUE", "NumThem",$table['NumThem']);
			  			}
			  			elseif ($key == "NumAngl") {
			  				echo GetOneEntry("LibAngl", "ANGLE", "NumAngl",$table['NumAngl']);
			  			}
			  			else{
							echo $table[$key];
			  			}
			  					?> 
			  			</div> 
			  		</td>
			  		<?php
			  	}?>
			    <td> <form action="View.php" method="post"> <input  type="submit" name="id" value="Voir" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $table[$primKey] ?>" >
			     </form> </td>

			    <td> <form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $table[$primKey] ?>" >
			     </form> </td>

			    <td><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $table[$primKey] ?>">  </form> </td>
			  </tr>
		
	<?php	
		}
	?>
</table>

	<p> <form action="Create.php" method="post"> <input  type="submit" name="submit" value="Créer"> </form> </p>

</body>
</html>