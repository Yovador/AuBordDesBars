<!DOCTYPE html>
<html>
<head>
	<title>Connection - Au Bord des Bars</title>
	<link  href="assets/css/connect.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
	<!--formulaire connection-->
	<form action="Connect.php" method="post">
  		<div class="form-group">
  		  <label for="exampleInputEmail1"> <p>Login :</p></label>
  		  <input class="form-control" id="exampleInputEmail1"  maxlength="20" type="text" name="Login">
  		  <small id="emailHelp" class="form-text text-muted">Votre mail ne sera jamais partagé</small>
  		</div>
  		<div class="form-group">
  		  <label for="exampleInputPassword1">Mot de passe :</label>
  		  <input type="password" class="form-control" id="exampleInputPassword1" maxlength="60" type="text" name="Pass">
  		</div>
  		<input class="btn btn-primary" type="submit" name="Connection">
	</form>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>