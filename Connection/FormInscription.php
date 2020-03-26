<!DOCTYPE html>
<html>
<head>
	<title>Créer un Compte - Au Bord Des Bars</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link  href="assets/css/inscription.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

	<div> <h1>Inscription</h1> </div>
	<form action="Create.php" method="post">
		<div class="form-group">
			<!--prénom-->
			<label for="exampleFormControlTextarea1"></label>
			<input class="form-control form-control-sm placeholder" id="exampleFormControlTextarea1" maxlength="60" type="text" name="FirstName" placeholder="Prénom"/>
		</div>
		<div class="form-group">
			<!--nom-->
			<label for="exampleFormControlTextarea1"></label>
			<input class="form-control form-control-sm placeholder" id="exampleFormControlTextarea1" maxlength="60" type="text" name="LastName" placeholder="Nom"/>
		</div>
		<div class="form-group">
			<!--e-mail-->
			<label for="exampleFormControlInput1"></label>
			<input type="email" class="form-control form-control-sm" id="exampleFormControlInput1" name="EMail" placeholder="E-mail">
		</div>
		<div class="form-group">		
			<!--login-->
			<label for="exampleFormControlTextarea1"></label>
			<input class="form-control form-control-sm placeholder" id="exampleFormControlTextarea1" maxlength="20" type="text" name="Login" placeholder="Login"/>
		</div>
		<div class="form-group">
			<!--mot de passe-->
			<label for="exampleFormControlTextarea1"></label>
			<input class="form-control form-control-sm placeholder" id="exampleFormControlTextarea1" maxlength="20" type="password" name="Pass" placeholder="Mot de passe"/>
		</div>
		<p><input class="btn btn-primary" type="submit" name="Submit" value="Inscription" /></p>
	</form>
	<!--btn inscription-->
	<!--btn retour-->
	<p><form  action="../index.php"><input class="btn btn-primary" type="submit" value="Retour"></form></p>
		
	<br>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>