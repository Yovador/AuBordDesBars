
<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Créer un Theme - Au Bord Des Bars</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link  href="../assets/css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	
</head>
<body>

	<div> <h1>Créé un Theme</h1> </div>

	<form action="Create.php" method="post">
		<div> 
			Nom du Theme : 
			<input maxlength="60" type="text" name="LibThem"/> 
		</div>

		<div> 

		<div> 
			Langue:
			<select type="text" name="Lib1Lang"> 
				<option value=""> Choississez un pays </option>
				<?php GetList("LANGUE", false ,$Info['NumLang'], "NumLang", "Lib1Lang", false, "", "")?>
			</select>
		</div>

		<p> <input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="./AllTheme.php"><input type="submit" value="Retour"></form></p>
	
	<br>

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
