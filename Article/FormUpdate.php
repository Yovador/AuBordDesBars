<?php include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";
$primKey = "NumArt";?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="Update.php" method="post">
	<?php 

		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		try {
			$request = $DB->query('SELECT * FROM ARTICLE WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
			?>		





				<div> 
					Titre : 
					<textarea maxlength="100" type="text" name="LibTitrA"/><?php echo htmlspecialchars($Info['LibTitrA']); ?></textarea> 
				</div>

				<div> 
					Chapo : 
					<textarea maxlength="500" type="text" name="LibChapoA"/><?php echo htmlspecialchars($Info['LibChapoA']); ?></textarea>
				</div>

				<div> 
					Accroche : 
					<textarea maxlength="100" type="text" name="LibAccrochA" /><?php echo htmlspecialchars($Info['LibAccrochA']); ?></textarea>
				</div>

				<div> 
					Paragraphe 1 :
					<textarea maxlength="1200" type="text" name="Parag1A" value=""/><?php echo htmlspecialchars($Info['Parag1A']); ?></textarea>
				</div>

				<div> 
					Sous-Titre 1 : 
					<textarea maxlength="100" type="text" name="LibSsTitr1"/><?php echo htmlspecialchars($Info['LibSsTitr1']); ?></textarea>
				</div>

				<div> 
					Paragraphe 2 : 
					<textarea maxlength="1200" type="text" name="Parag2A"/><?php echo htmlspecialchars($Info['Parag2A'])?></textarea>
				</div>

				<div> 
					Sous-Titre 2 : 
					<textarea maxlength="100" type="text" name="LibSsTitr2"/><?php echo htmlspecialchars($Info['LibSsTitr2']); ?></textarea>
				</div>

				<div> 
					Paragraphe 3 : <textarea maxlength="1200" type="text" name="Parag3A"/><?php echo htmlspecialchars($Info['Parag3A']); ?></textarea>
				</div>

				<div> 
					Conclusion : <textarea maxlength="800" type="text" name="LibConclA"/><?php echo htmlspecialchars($Info['LibConclA']); ?></textarea>
				</div>

				<div> 
					UrlPhoto : <input maxlength="60" type="text" name="UrlPhotA" value="<?php echo htmlspecialchars($Info['UrlPhotA']); ?>"/>
				</div>

				<div> 
		 			Angle : 
		 			<select type="text" name="NomAngl"> 
		 				<option value=""> Choississez un Angle </option>
		 				<?php GetList("ANGLE", true ,$Info['NumAngl'], "NumAngl", "LibAngl") ?> 
		 			</select>
		 		</div>

		 		<div>
		 			Thematique : 
		 			<select type="text" name="NomThem"> 
		 				<option value=""> Choississez une Thematique </option>
		 				<?php GetList("THEMATIQUE", true ,$Info['NumThem'], "NumThem", "LibThem")?> 
		 			</select>
		 		</div>

		 		<div>
		 			Langue : 
		 			<select type="text" name="NomLang"> 
		 				<option value=""> Choississez une Langue </option>
		 				<?php GetList("LANGUE", true ,$Info['NumLang'], "NumLang", "Lib1Lang") ?> 
		 			</select>
		 		</div>

					

				<p><input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $Info[$primKey] ?>" > </p>
			<?php 
			}
		}

		catch (PDOException $e) {
			echo $e;
			$DB->rollBack();
		}		
	?>
	</form>

	
	<p><form action="../index.php"><input type="submit" value="Retour"></form></p>
</body>
</html>
