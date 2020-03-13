<?php include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 
$primKey = "NumCom";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<table style="width:50%">
		<tr>
			<th>Num Commentaire</th>
			<th>Date création</th>
		    <th>Pseudo Auteur</th>
		    <th>Mail Auteur</th>
		    <th>Titre Commentaire</th>
		    <th>Libellé Commentaire</th>
		    <th>Numéro Article associé</th>
		    <th>Voir</th>
		    <th>Modifier</th>
		    <th>Supprimer</th>
		 </tr>

	<?php 


		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		$request = $DB->query('SELECT * FROM COMMENT');
		while ($table = $request->fetch(PDO::FETCH_ASSOC) ) {
	?>		
			  <tr>
			  	<?php foreach ($table as $key => $value) {
			  		?>
			  		<td> 
			  			<div> 
			  			<?php
			  			if ($key == "NumArt") {
			  				echo GetOneEntry("LibTitrA", "ARTICLE", "NumArt",$table['NumArt']);
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