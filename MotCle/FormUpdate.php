<?php include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";
$primKey = "NumMoCle";?>

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
			$request = $DB->query('SELECT * FROM MOTCLE WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch()) {
			?>
				<p><input type="text" name="LibMoCle" value="<?php echo $Info['LibMoCle'] ?>" ></p>
				<p><select type="text" name="NomLang"> <?php GetList("LANGUE", true ,$Info['NumLang'], "NumLang", "Lib1Lang") ?> </select> </p>

				<p><input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo htmlspecialchars($Info[$primKey]) ?>" > </p>
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