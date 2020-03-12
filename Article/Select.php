<?php $ListOfKey= array(
	'',
	'', 
	'', 
	'', 
	'', 
	'', 
	'',  

); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<table style="width:50%">
		<tr>
			<th>Date Création</th>
			<th>Titre</th>
		    <th>Chapo</th>
		    <th>Accroche</th>
		    <th>Paragraphe 1</th>
		    <th>Sous-titre 1</th>
		    <th>Paragraphe 2</th>
		    <th>Sous-titre 2</th>
		    <th>Paragraphe 3</th>
		    <th>Conclusion</th>
		    <th>Url Photo</th>
		    <th>Likes</th>
		    <th>Angles</th>
		    <th>Theme</th>
		    <th>Langues</th>
		    <th>Voir</th>
		    <th>Modifier</th>
		    <th>Supprimer</th>
		 </tr>

	<?php 


		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		$request = $DB->query('SELECT * FROM ARTICLE');
		while ($Article = $request->fetch(PDO::FETCH_ASSOC) ) {
	?>		
			  <tr>
			  	<?php foreach ($Article as $key => $value) {
			  		if ($key != "NumArt") {
			  		?>
			  		<td> 
			  			<div> 
			  			<?php
			  			echo $Article[$key];
			  					?> 
			  			</div> 
			  		</td>
			  		<?php
			  	}} ?>

			    <td> <form action="View.php" method="post"> <input  type="submit" name="id" value="Voir" > <input  type="hidden" name="NumLang" value="<?php echo $Article['NumLang'] ?>" >
			     </form> </td>

			    <td> <form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumLang" value="<?php echo $Article['NumLang'] ?>" >
			     </form> </td>

			    <td><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumLang" value="<?php echo $Article['NumLang'] ?>">  </form> </td>
			  </tr>
		
	<?php	
		}
	?>
</table>

	<p> <form action="Create.php" method="post"> <input  type="submit" name="submit" value="Créer"> </form> </p>

</body>
</html>