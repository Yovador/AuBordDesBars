	<?php
include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Écrire un Article - Au Bord Des Bars</title>
</head>
<body>

	<!-- Bouton Home -->
	<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>


	<div> <h1>Écrire un Article</h1> </div>

	<form action="Create.php" method="post" enctype="multipart/form-data" >

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
			UrlPhoto : <input type="file" name="File" />
		</div>

		<div> 
			<?php 
				include "../General/connectionBD.php";
				$GetMot = $DB->query('SELECT * FROM MOTCLE');
				while ($Mot = $GetMot->fetch()) {
			?>
					<input style="margin:1rem;" type="checkbox" name="<?php echo$Mot['NumMoCle']; ?>" id="<?php echo$Mot['NumMoCle']; ?>" value="<?php echo$Mot['NumMoCle']; ?>"><label for="<?php echo$Mot['NumMoCle']; ?>">"<?php echo$Mot['LibMoCle']; ?>"</label>
			<?php
				}
			?>  
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

	<form action="./AllArticle.php" method="post"> <input  type="submit" name="id" value="Retour à la liste des Articles" ></form> 
	
	<br>
</body>
</html>

