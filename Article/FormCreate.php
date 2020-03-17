<?php
include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>BlogArt - Ajouter un Commentaire</title>
</head>
<body>
	<h1>Ajouter un Commentaire:</h1> <br>

	<form action="Create.php" method="post">
		<p> Titre : <input type="text" name="LibTitrA" /> </p>
		<p> Chapo : <input type="text" name="LibChapoA" /> </p>
		<p> Accroche : <input type="text" name="LibAccrochA" /> </p>
		<p> Paragraphe 1 : <input type="text" name="Parag1A" /> </p>
		<p> Sous-Titre 1 : <input type="text" name="LibSsTitr1" /> </p>
		<p> Paragraphe 2 : <input type="text" name="Parag2A" /> </p>
		<p> Sous-Titre 2 : <input type="text" name="LibSsTitr2" /> </p>
		<p> Paragraphe 3 : <input type="text" name="Parag3A" /> </p>
		<p> Conclusion : <input type="text" name="LibConclA" /> </p>
		<p> UrlPhoto : <input type="text" name="UrlPhotA" /> </p>
		<p> Likes : <input type="text" name="Likes" /> </p>

 		<p>
 			Angle : 
 			<select type="text" name="NomAngl"> 
 				<option value=""> Choississez un Angle </option>
 				<?php GetList("ANGLE", false ,"", "", "LibAngl") ?> 
 			</select>
 		</p>

 		<p>
 			Thematique : 
 			<select type="text" name="NomThem"> 
 				<option value=""> Choississez une Thematique </option>
 				<?php GetList("THEMATIQUE", false ,"", "", "LibThem") ?> 
 			</select>
 		</p>

 		<p>
 			Langue : 
 			<select type="text" name="NomLang"> 
 				<option value=""> Choississez une Langue </option>
 				<?php GetList("LANGUE", false ,"", "", "Lib1Lang") ?> 
 			</select>
 		</p>

		<p><input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="Select.php"><input type="submit" value="Retour"></form></p>
	
	<br>
</body>
</html>

