<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php
	include "../General/SelectList.php";
	include "../General/GetOneEntry.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Écrire un Article - Au Bord Des Bars</title>
</head>
<body>

	<!-- Bouton Home -->
	<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>


	<div> <h1>Écrire un Article</h1> </div>

	<form id="Global" action="Create.php" method="post" enctype="multipart/form-data" >

		<div> 
			Titre : 
			<input maxlength="100" type="text" name="LibTitrA" value="<?php if(isset($_POST['LibTitrA'])){echo $_POST['LibTitrA'];} ?>"/>
		</div>
		<div> 
			Chapo : 
			<textarea maxlength="500" type="text" name="LibChapoA"/><?php if(isset($_POST['LibChapoA'])){echo $_POST['LibChapoA'];} ?></textarea>
		</div>
		<div> 
			Accroche : 
			<input maxlength="100" type="text" name="LibAccrochA" value="<?php if(isset($_POST['LibAccrochA'])){echo $_POST['LibAccrochA'];} ?>" />
		</div>
		<div> 
			Paragraphe 1 : <textarea maxlength="1200" type="text" name="Parag1A"/><?php if(isset($_POST['Parag1A'])){echo $_POST['Parag1A'];} ?></textarea>
		</div>
		<div> 
			Sous-Titre 1 : <input maxlength="100" type="text" name="LibSsTitr1" value="<?php if(isset($_POST['LibSsTitr1'])){echo $_POST['LibSsTitr1'];} ?>"/>
		</div>
		<div> 
			Paragraphe 2 : <textarea maxlength="1200" type="text" name="Parag2A" /><?php if(isset($_POST['Parag2A'])){echo $_POST['Parag2A'];} ?></textarea>
		</div>
		<div> 
			Sous-Titre 2 : <input maxlength="100" type="text" name="LibSsTitr2" value="<?php if(isset($_POST['LibSsTitr2'])){echo $_POST['LibSsTitr2'];} ?>"/>
		</div>
		<div> 
			Paragraphe 3 : <textarea maxlength="1200" type="text" name="Parag3A" /><?php if(isset($_POST['Parag3A'])){echo $_POST['Parag3A'];} ?></textarea>
		</div>
		<div> 
			Conclusion : <textarea maxlength="800" type="text" name="LibConclA" /><?php if(isset($_POST['LibConclA'])){echo $_POST['LibConclA'];} ?></textarea>
		</div>

		<div> 
			UrlPhoto : <input type="file" name="File" />
		</div>

</form>
<!-- Langue -->
		<div>
			Langue :
			<form action="Create.php" method="post">
	 			<?php 
	 				
	 				if (isset($_POST['NomLang'])) {
	 					$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang", $_POST['NomLang'])
				?> 
			 			<select type="text" name="NomLang"> 
			 				<option value=""> Choississez une Langue </option>
			 				<?php GetList("LANGUE", true ,$NumLang, "NumLang", "Lib1Lang", false, "", "") ?> 
			 			</select>


	 			<?php
	 				}
	 				else{
	 			?>

			 			<select type="text" name="NomLang"> 
			 				<option value=""> Choississez une Langue </option>
			 				<?php GetList("LANGUE", false ,"", "", "Lib1Lang", false, "", "") ?> 
			 			</select>

	 			<?php
	 					$NumLang = "";
	 				}

	 			 ?>

	 			<input type="submit" name="langue"/><input type="hidden" name="NumLang" value="<?php echo $NumLang; ?>"/>

 			</form>

 		</div>



 		<?php if (!isset($_POST['NomLang'])): ?>
 			<?php $_SESSION['MotCle'] = array(); ?>
 		<?php endif ?>

<!-- Angle -->
 
 		<div>
 			
		<?php 
			if (isset($_POST['NomLang'])) {
		?>
				Angle :
		<?php 
	 			 
	 			if (isset($_POST['NomAngl'])) {
	 				$NumAngl = GetOneEntry("NumAngl", "ANGLE", "LibAngl", $_POST['NomAngl'])
		?>	

			 			<select type="text" name="NomAngl" form="Global">> 
			 				<option value=""> Choississez un Angle </option>
			 				<?php GetList("ANGLE", true ,$NumAngl, "NumAngl", "LibAngl", true, "NumLang", $NumLang ) ?> 
			 			</select>

	 	<?php
	 			}
	 			else{
	 	?>
					
	 					
			 			<select type="text" name="NomAngl" form="Global">> 
			 				<option value=""> Choississez un Angle </option>
			 				<?php GetList("ANGLE", false ,"", "", "LibAngl", true, "NumLang", $NumLang ) ?> 
			 			</select>
		<?php
	 			}
	 		}
	 	?>
	 	</div>

		
<!-- Thème -->

		<div>
 		
		<?php 
			if (isset($_POST['NomLang'])) {
		?>
				Thème :
		<?php 
	 			 
	 			if (isset($_POST['NomThem'])) {
	 				$NumThem = GetOneEntry("NumThem", "THEMATIQUE", "LibThem", $_POST['NomThem'])
		?>	

			 			<select type="text" name="NomThem" form="Global"> 
			 				<option value=""> Choississez un Theme </option>
			 				<?php GetList("THEMATIQUE", true ,$NumThem, "NumThem", "LibThem", true, "NumLang", $NumLang ) ?> 
			 			</select>

	 	<?php
	 			}
	 			else{
	 	?>
					
	 					
			 			<select type="text" name="NomThem" form="Global">> 
			 				<option value=""> Choississez un Theme </option>
			 				<?php GetList("THEMATIQUE", false ,"", "", "LibThem", true, "NumLang", $NumLang ) ?> 
			 			</select>
		<?php
	 			}
	 		}
	 	?>
	 	</div>

<!-- Mot clé -->

		<div>
		
			<form action="Create.php" method="post">

				<?php 
					if (isset($_POST['NomLang'])) {
				?>
						Mot clé :
				<?php 
			 			 
			 			if (isset($_POST['NomMotCle'])) {
			 				$NumMoCle = GetOneEntry("NumMoCle", "MOTCLE", "LibMoCle", $_POST['NomMotCle'])
				?>
					 			<select type="text" name="NomMotCle"> 
					 				<option value=""> Choississez un Mot Clé </option>
					 				<?php GetList("MOTCLE", true ,$NumMoCle, "NumMoCle", "LibMoCle", true, "NumLang", $NumLang ) ?> 
					 			</select>

			 	<?php
			 			}
			 			else{
			 	?>
					 			<select type="text" name="NomMotCle"> 
					 				<option value=""> Choississez un  Mot Clé </option>
					 				<?php GetList("MOTCLE", false ,"", "", "LibMoCle", true, "NumLang", $NumLang ) ?> 
					 			</select>
				<?php
			 			}
			 	?>


			 	<input type="submit" name="Motclé" value="Ajouter un mot clé !"> 
			 	<input type="hidden" name="NomLang" value="<?php echo $_POST['NomLang'];?>">	

			 	<?php
			 		}
			 	?>
			 	
		 	</form>
		 	<?php if (isset($_POST['NomMotCle'])) {
		 		if ($_POST['NomMotCle'] != "") {
		 			if (!in_array($_POST['NomMotCle'], $_SESSION['MotCle'])) {
		 				array_push($_SESSION['MotCle'], $_POST['NomMotCle']);
		 			}
		 		}

		 	}
		 	?>

		 	<?php if (isset($_POST['MotCleSuppr'])) {
		 		unset($_SESSION['MotCle'][ $_POST['MotCleSuppr'] ]);
		 	}
		 	?>
		 	<?php if (isset($_POST['NomLang'])): ?>
			 	<div>
				 	<?php 
				 		foreach ($_SESSION['MotCle'] as $key => $value) {
				 	?>
				 		<form action="./Create.php" method="post">

				 			<?php echo $value; ?> <input type="submit" name="RemoveMo" value="Supprimer le mot clé !">
				 			<input type="hidden" name="MotCleSuppr" value="<?php echo $key;?>">	
				 			<input type="hidden" name="NomLang" value="<?php echo $_POST['NomLang'];?>">
				 			<?php if (isset($_POST['NomMotCle'])): ?>
				 			<input type="hidden" name="NomMotCle" value="<?php echo $_POST['NomMotCle'];?>">	
				 			<?php endif ?>
				 		</form>
				 	<?php
				 		} 
				 	?>
			 	</div>
		 	<?php endif ?>

	 	</div>
	
		<p> <input type="submit" name="Submit" value="Valider" form="Global" /></p>

	<form action="./AllArticle.php" method="post"> <input  type="submit" name="id" value="Retour à la liste des Articles" ></form> 
	
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