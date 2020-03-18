<?php include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";
$primKey = "NumAngl";?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier un Angle - Au Bord Des Bars</title>
</head>
<body>
	<form action="Update.php" method="post">
	<?php 

		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		try {
			$request = $DB->query('SELECT * FROM ANGLE WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
			?>		

				<div> 
					Nom de l'angle : 
					<textarea maxlength="60" type="text" name="LibAngl"/><?php echo htmlspecialchars($Info['LibAngl']); ?></textarea> 
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

	
	<p><form action="./AllAngle.php"><input type="submit" value="Retour"></form></p>

</body>
</html>
