<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

	<?php
include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Écrire un Article - Au Bord Des Bars</title>
</head>
<body>

	<div> <h1>Écrire un Article</h1> </div>

	<form action="Create.php" method="post">


		<div> 
			Libellé Court : 
			<input maxlength="25" type="text" name="Lib1Lang"/>
		</div>

		<div> 
			Libellé Long : 
			<input maxlength="45" type="text" name="Lib2Lang"/>
		</div>

		<div> 
 			Pays : 
 			<select type="text" name="frPays"> 
 				<option value=""> Choississez un pays </option>
 				<?php GetList("PAYS", false ,$Info['NumPays'], "NumPays", "frPays") ?> 
 			</select>
 		</div>

		<p> <input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="./AllLangue.php"><input type="submit" value="Retour"></form></p>
	
	<br>
</body>
</html>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>
