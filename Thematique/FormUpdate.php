<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>



<?php include "../General/SelectList.php";
$primKey = "NumThem";?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier un Theme - Au Bord Des Bars</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link  href="../assets/css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


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
		 				<?php GetList("LANGUE", true ,$Info['NumLang'], "NumLang", "Lib1Lang", false, "", "")?>
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

	 <?php include "../footer.php" //Affiche le Footer?>

</body>
</html>


<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>