<!DOCTYPE html>
	<html>
	<head>
		<title>Créer un Compte - Au Bord Des Bars</title>
	</head>
	<body>

		<div> <h1>Créer un Compte</h1> </div>

		<form action="Create.php" method="post">
			<div> 
				Login : 
				<input maxlength="20" type="text" name="Login"/>
			</div>

			<div> 
				Mot de passe : 
				<input maxlength="60" type="password" name="Pass"/>
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

			<p> <input type="submit" name="Submit" value="Créé" /></p>
		</form>

		<p><form action="../index.php"><input type="submit" value="Retour"></form></p>
		
		<br>
	</body>
	</html>