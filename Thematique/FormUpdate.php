<?php include "../General/SelectList.php";
$primKey = "NumThem";?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier un Theme - Au Bord Des Bars</title>
</head>
<body>
	<form action="Update.php" method="post">
	<?php 

		include "../General/connectionBD.php";

		try {
			$request = $DB->query('SELECT * FROM THEMATIQUE WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
			?>		

				<div> 
					Nom du Theme : 
					<input maxlength="60" type="text" name="LibThem" value="<?php echo htmlspecialchars($Info['LibThem']); ?>" />
				</div>

				<div> 

				<div> 
		 			Langue :
		 			<select type="text" name="NomLang"> 
		 				<option value=""> Choississez un pays </option>
		 				<?php GetList("LANGUE", true ,$Info['NumLang'], "NumLang", "Lib1Lang")?>
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

	
	<p><form action="./AllTheme.php"><input type="submit" value="Retour"></form></p>

</body>
</html>
