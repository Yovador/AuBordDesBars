	<?php
include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Écrire un Article - Au Bord Des Bars</title>
</head>
<body>

	<div> <h1>Écrire un Article</h1> </div>

	<form action="Create.php" method="post">

		<div> 
			Titre : 
			<textarea maxlength="100" type="text" name="LibTitrA" /></textarea> 
		</div>
		<div> 
			Chapo : 
			<textarea maxlength="500" type="text" name="LibChapoA"/></textarea>
		</div>
		<div> 
			Accroche : 
			<textarea maxlength="100" type="text" name="LibAccrochA" /></textarea>
		</div>
		<div> 
			Paragraphe 1 : <textarea maxlength="1200" type="text" name="Parag1A"/></textarea>
		</div>
		<div> 
			Sous-Titre 1 : <textarea maxlength="100" type="text" name="LibSsTitr1" /></textarea>
		</div>
		<div> 
			Paragraphe 2 : <textarea maxlength="1200" type="text" name="Parag2A" /></textarea>
		</div>
		<div> 
			Sous-Titre 2 : <textarea maxlength="100" type="text" name="LibSsTitr2" /></textarea>
		</div>
		<div> 
			Paragraphe 3 : <textarea maxlength="1200" type="text" name="Parag3A" /></textarea>
		</div>
		<div> 
			Conclusion : <textarea maxlength="800" type="text" name="LibConclA" /></textarea>
		</div>
		<div> 
			UrlPhoto : <input maxlength="60" type="text" name="UrlPhotA" />
		</div>

		<div> 
 			Angle : 
 			<select type="text" name="NomAngl"> 
 				<option value=""> Choississez un Angle </option>
 				<?php GetList("ANGLE", false ,"", "", "LibAngl") ?> 
 			</select>
 		</div>

 		<div>
 			Thematique : 
 			<select type="text" name="NomThem"> 
 				<option value=""> Choississez une Thematique </option>
 				<?php GetList("THEMATIQUE", false ,"", "", "LibThem") ?> 
 			</select>
 		</div>

 		<div>
 			Langue : 
 			<select type="text" name="NomLang"> 
 				<option value=""> Choississez une Langue </option>
 				<?php GetList("LANGUE", false ,"", "", "Lib1Lang") ?> 
 			</select>
 		</div>

		<p> <input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="../index.php"><input type="submit" value="Retour"></form></p>
	
	<br>
</body>
</html>

