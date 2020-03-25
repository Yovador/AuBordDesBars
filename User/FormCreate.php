<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


	<?php include "../General/SelectList.php";?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Créer un User - Au Bord Des Bars</title>
	</head>
	<body>

		<div> <h1>Créé un User</h1> </div>

		<form action="Create.php" method="post">
			<div> 
				Login : 
				<input maxlength="20" type="text" name="Login"/>
			</div>

			<div> 
				Mot de passe : 
				<input maxlength="60" type="text" name="Pass"/>
			</div>

			<div> 
				Prénom : 
				<input maxlength="60" type="text" name="FirstName"/>
			</div>

			<div> 
				Nom de Famille : 
				<input maxlength="60" type="text" name="LastName"/>
			</div>

			<div> 
				Adresse Mail : 
				<input maxlength="60" type="text" name="EMail"/>
			</div>

			<div> 
				Is Admin ? 
				<input type="checkbox" name="admin"/>
			</div>

			<p> <input type="submit" name="Submit" value="Valider" /></p>
		</form>

		<p><form action="./AllUser.php"><input type="submit" value="Retour"></form></p>
		
		<br>
	</body>
	</html>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>