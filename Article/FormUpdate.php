<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php include "../General/SelectList.php";
include "../General/GetOneEntry.php";
$primKey = "NumArt";?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<!-- Bouton Home -->
	<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>


	<form action="Update.php" method="post" enctype="multipart/form-data" >
	<?php 

		include "../General/connectionBD.php";

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
					UrlPhoto : <input type="file" name="File"/>
				</div>

				<div> 
					<?php 
						include "../General/connectionBD.php";
						$GetMot = $DB->query('SELECT * FROM MOTCLE');
						while ($Mot = $GetMot->fetch()) {
							$GetLink = $DB->query('SELECT COUNT(*) FROM MOTCLEARTICLE WHERE NumArt ="'.$_POST[$primKey].'" AND NumMoCle = "'.$Mot["NumMoCle"].'" ');
							while ($Count = $GetLink->fetch()) {
								if ($Count['COUNT(*)'] > 0) {
					?>
									<input style="margin:1rem;" type="checkbox" name="<?php echo$Mot['NumMoCle']; ?>" id="<?php echo$Mot['NumMoCle']; ?>" value="<?php echo$Mot['NumMoCle']; ?>" checked><label for="<?php echo$Mot['NumMoCle']; ?>">"<?php echo$Mot['LibMoCle']; ?>"</label>
					<?php
								}
								else{
					?>
									<input style="margin:1rem;" type="checkbox" name="<?php echo$Mot['NumMoCle']; ?>" id="<?php echo$Mot['NumMoCle']; ?>" value="<?php echo$Mot['NumMoCle']; ?>"><label for="<?php echo$Mot['NumMoCle']; ?>">"<?php echo$Mot['LibMoCle']; ?>"</label>
					<?php
								}
							}
						}
					?>  
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

	
	<form action="./AllArticle.php" method="post"> <input  type="submit" name="id" value="Retour à la liste des Articles" ></form> 

</body>
</html>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>
