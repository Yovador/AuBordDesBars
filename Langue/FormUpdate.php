<?php include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="Update.php" method="post">
	<?php 
		echo "NumLang ", $_POST['NumLang'], "<br>", "<br>";
		

		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

		try {
			$request = $DB->query('SELECT * FROM LANGUE WHERE NumLang ="'.$_POST['NumLang'].'" ');
			while ($InfoLang = $request->fetch()) {
			?>
				<p><input type="text" name="Lib1Lang" value="<?php echo $InfoLang['Lib1Lang'] ?>" ></p>
				<p><input type="text" name="Lib2Lang" value="<?php echo $InfoLang['Lib2Lang'] ?>" ></p>
				<p><select type="text" name="frPays"> <?php GetList("PAYS", true ,$InfoLang['NumPays'], "numPays", "frPays") ?> </select> </p>

				<p><input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumLang" value="<?php echo htmlspecialchars($InfoLang['NumLang']) ?>" > </p>
			<?php 
			}
		}

		catch (PDOException $e) {
			echo $e;
			$DB->rollBack();
		}		
	?>

	</form>
	<p><form action="Select.php"><input type="submit" value="Retour Langue"></form></p>
</body>
</html>
