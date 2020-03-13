<?php include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 
$primKey = "NumThem";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<table style="width:50%">
		<tr>
			<th>Num Theme</th>
			<th>Nom Theme</th>
		    <th>Num Lang </th>
		    <th>Voir</th>
		    <th>Modifier</th>
		    <th>Supprimer</th>
		 </tr>

	<?php 


		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		$request = $DB->query('SELECT * FROM THEMATIQUE');
		while ($Theme = $request->fetch(PDO::FETCH_ASSOC) ) {
	?>		
			  <tr>
			  	<?php foreach ($Theme as $key => $value) {
			  		?>
			  		<td> 
			  			<div> 
			  			<?php
			  			if ($key == "NumLang") {
			  				echo GetOneEntry("Lib1Lang", "LANGUE", "NumLang",$Theme['NumLang']);
			  			}
			  			else{
							echo $Theme[$key];
			  			}
			  					?> 
			  			</div> 
			  		</td>
			  		<?php
			  	}?>
			    <td> <form action="View.php" method="post"> <input  type="submit" name="id" value="Voir" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $Theme[$primKey] ?>" >
			     </form> </td>

			    <td> <form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $Theme[$primKey] ?>" >
			     </form> </td>

			    <td><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $Theme[$primKey] ?>">  </form> </td>
			  </tr>
		
	<?php	
		}
	?>
</table>

	<p> <form action="Create.php" method="post"> <input  type="submit" name="submit" value="Créer"> </form> </p>

</body>
</html>