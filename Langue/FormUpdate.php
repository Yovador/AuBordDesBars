<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php include "../General/SelectList.php";
$primKey = "NumLang";?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="Update.php" method="post">
	<?php 

		include "../General/connectionBD.php";

		try {
			$request = $DB->query('SELECT * FROM LANGUE WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
			?>		

				<div> 
					Libellé Court : 
					<input maxlength="25" type="text" name="Lib1Lang" value="<?php echo htmlspecialchars($Info['Lib1Lang']); ?> " />
				</div>

				<div> 
					Libellé Long : 
					<input maxlength="45" type="text" name="Lib2Lang" value="<?php echo htmlspecialchars($Info['Lib2Lang']); ?>" />
				</div>

				<div> 
					Pays : 
		 			<select type="text" name="frPays"> 
		 				<option value=""> Choississez un pays </option>
		 				<?php GetList("PAYS", true ,$Info['NumPays'], "numPays", "frPays")?>
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

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>