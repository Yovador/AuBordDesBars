	<?php
include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Créer un Mot Clé - Au Bord Des Bars</title>
</head>
<body>

	<div> <h1>Créé un Mot Clé</h1> </div>

	<form action="Create.php" method="post">
		<div> 
			Mot clé : 
			<input maxlength="60" type="text" name="LibMoCle"/>
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

	<p><form action="./AllMot.php"><input type="submit" value="Retour"></form></p>
	
	<br>
</body>
</html>

