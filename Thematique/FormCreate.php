	<?php
include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Créer un Theme - Au Bord Des Bars</title>
</head>
<body>

	<div> <h1>Créé un Theme</h1> </div>

	<form action="Create.php" method="post">
		<div> 
			Nom du Theme : 
			<input maxlength="60" type="text" name="LibThem"/> 
		</div>

		<div> 

		<div> 
			Langue:
			<select type="text" name="Lib1Lang"> 
				<option value=""> Choississez un pays </option>
				<?php GetList("LANGUE", false ,$Info['NumLang'], "NumLang", "Lib1Lang")?>
			</select>
		</div>

		<p> <input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="./AllTheme.php"><input type="submit" value="Retour"></form></p>
	
	<br>
</body>
</html>

