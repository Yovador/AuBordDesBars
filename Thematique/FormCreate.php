<?php
include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>BlogArt - Ajouter une Thématique</title>
</head>
<body>
	<h1>Ajouter une Thématique :</h1> <br>

	<form action="Create.php" method="post">
		<p> Libellé Thematique : <input type="text" name="LibThem" /> </p>
 		<p>
 			Langue : 
 			<select type="text" name="Lib1Lang"> 
 				<option value=""> Choississez une Langue... </option>
 				<?php GetList("LANGUE", false ,"", "", "Lib1Lang") ?> 
 			</select>
 		</p>
		<p><input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="Select.php"><input type="submit" value="Retour Langue"></form></p>
	
	<br>
</body>
</html>
