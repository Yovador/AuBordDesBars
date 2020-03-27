<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

	<?php
include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Créer un Angle - Au Bord Des Bars</title>
</head>
<body>

	<div> <h1>Créé un Angle</h1> </div>

	<form action="Create.php" method="post">
		<div> 
			Nom de l'angle : 
			<input maxlength="60" type="text" name="LibAngl"/> 
		</div>

		<div> 

		<div> 
			Langue:
			<select type="text" name="Lib1Lang"> 
				<option value=""> Choississez un pays </option>
				<?php GetList("LANGUE", false ,$Info['NumLang'], "NumLang", "Lib1Lang", false, "", "")?>
			</select>
		</div>

		<p> <input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="./AllAngle.php"><input type="submit" value="Retour"></form></p>
	
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

