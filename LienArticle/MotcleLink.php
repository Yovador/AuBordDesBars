<?php include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";

	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2><?php echo GetOneEntry("LibTitrA","ARTICLE","NumArt",$_POST['NumArt']) ?></h2>

	<?php 
		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		$request = $DB->query("SELECT * FROM MOTCLEARTICLE WHERE NumArt ='".$_POST['NumArt']."'");
	?>
	<table width="50%">

	<?php
		while ($table = $request->fetch(PDO::FETCH_ASSOC) ) {
	?>		
			  <tr>
			  	<?php
			  	foreach ($table as $key => $value) {
			  	?>
			  		<td > 
			  			<div> 
			  			<?php
			  			if ($key == "NumMoCle") {
			  				echo GetOneEntry("LibMoCle","MOTCLE","NumMoCle",$table[$key]);
			  			}
			  			?> 
			  			</div> 
			  		</td>
				<?php 
				} 
				?>

				    	<td><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="<?php echo "NumMoCle" ?>" value="<?php echo $table['NumMoCle'] ?>"> <input  type="hidden" name="<?php echo "NumArt" ?>" value="<?php echo $table['NumArt'] ?>">  </form> </td>

		<?php
		}
		?>

	</table>


	<h3>Ajouter Mot Cle :</h3>

	<form action="AddKeyWord.php" method="post">
		<?php 
		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		?>
		<!--<p><select type="text" name="NomArt">
			<?php //GetList("ARTICLE", true ,$_POST['NumArt'], "NumArt", "LibTitrA");?>
		</select></p>-->

		<p><select type="text" name="NomMoCle">
			<option value="">Choississez Mot Clé</option>
			<?php GetList("MOTCLE", false ,"", "", "LibMoCle");?>
		</select></p>



		<p><input type="submit" name="Submit" value="Valider" /> <input  type="hidden" name="<?php echo "NumArt" ?>" value="<?php echo $_POST['NumArt']?>"> </p>

	</form>
	<p><form action="../Article/Select.php"><input type="submit" value="Retour"></form></p>
</body>
</html>
