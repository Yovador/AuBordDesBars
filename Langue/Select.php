<?php include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<table style="width:50%">
		<tr>
			<th>Libellé Langue Court</th>
			<th>Libellé Langue Long</th>
		    <th>Pays</th>
		    <th>Voir</th>
		    <th>Modifier</th>
		    <th>Supprimer</th>
		 </tr>

	<?php 


		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		$request = $DB->query('SELECT * FROM LANGUE');
		while ($Langue = $request->fetch(PDO::FETCH_ASSOC) ) {
	?>		
			  <tr>
			  	<?php foreach ($Langue as $key => $value) {
			  		if ($key != "NumLang") {
			  		?>
			  		<td> 
			  			<div> 
			  			<?php
			  			if ($key == "NumPays") {
			  				echo GetOneEntry("frPays", "PAYS", "numPays",$Langue['NumPays']);
			  			}
			  			else{
							echo $Langue[$key];
			  			}
			  					?> 
			  			</div> 
			  		</td>
			  		<?php
			  	}} ?>

			    <td> <form action="View.php" method="post"> <input  type="submit" name="id" value="Voir" > <input  type="hidden" name="NumLang" value="<?php echo $Langue['NumLang'] ?>" >
			     </form> </td>

			    <td> <form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumLang" value="<?php echo $Langue['NumLang'] ?>" >
			     </form> </td>

			    <td><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumLang" value="<?php echo $Langue['NumLang'] ?>">  </form> </td>
			  </tr>
		
	<?php	
		}
	?>
</table>

	<p> <form action="Create.php" method="post"> <input  type="submit" name="submit" value="Créer"> </form> </p>

</body>
</html>