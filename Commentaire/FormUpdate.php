<?php include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";
$primKey = "NumCom";?>

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
			$request = $DB->query('SELECT * FROM COMMENT WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
			?>
				<?php foreach ($Info as $key => $value) {
					if ($key != "NumCom" && $key != "DtCreC") {
						if ($key == "NumArt"  ) {
						?>
							<p><select type="text" name="NomArt"> <?php GetList("ARTICLE", true ,$Info['NumArt'], "NumArt", "LibTitrA") ?> </select> </p>
						<?php 
						} 

						else{
						?>
							<p><input type="text" name="<?php echo $key ?>" value="<?php echo $value ?>" ></p>
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
