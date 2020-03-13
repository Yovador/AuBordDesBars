<?php include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";
$primKey = "NumAngl";?>

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
			$request = $DB->query('SELECT * FROM ANGLE WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch()) {
			?>
				<p><input type="text" name="LibAngl" value="<?php echo $Info['LibAngl'] ?>" ></p>
				<p><select type="text" name="NomLang"> <?php GetList("LANGUE", true ,$Info['NumLang'], "NumLang", "Lib1Lang") ?> </select> </p>

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
