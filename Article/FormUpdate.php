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
		echo $primKey, $_POST[$primKey], "<br>", "<br>";
		

		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		try {
			$request = $DB->query('SELECT * FROM ARTICLE WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
			?>
				<?php foreach ($Info as $key => $value) {
					if ($key != "NumArt" && $key != "DtCreA") {
						if ($key == "NumAngl") {
						?>
							<p><select type="text" name="NomAngl"> <?php GetList("ANGLE", true ,$Info['NumAngl'], "NumAngl", "LibAngl") ?> </select> </p>
						<?php 
						} 
						elseif ($key == "NumThem") {
						?>
							<p><select type="text" name="NomThem"> <?php GetList("THEMATIQUE", true ,$Info['NumThem'], "NumThem", "LibThem")?> </select> </p>
						<?php 
						}
						elseif ($key == "NumLang") {
						?>
							<p><select type="text" name="NomLang"> <?php GetList("LANGUE", true ,$Info['NumLang'], "NumLang", "Lib1Lang") ?> </select> </p>
						<?php 
						}

						else{
						?>
							<p><input style="padding: 0.2rem" size="50" type="text" name="<?php echo $key ?>" value="<?php echo htmlspecialchars($value); ?>" ></p>
						<?php
						}
					}
			} ?>
				
					

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
	<p><form action="Select.php"><input type="submit" value="Retour"></form></p>
</body>
</html>
