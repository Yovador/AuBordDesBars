<?php include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Créer un Commentaire - Au Bord Des Bars</title>
</head>
<body>

	<div> <h1>Créé un Commentaire</h1> </div>

	<form action="ArticleViewUser.php" method="post">
		<div> 
			Pseudo de l'auteur : 
			<input maxlength="20" type="text" name="PseudoAuteur"/>
		</div>

		<div> 
			Mail de l'auteur : 
			<input maxlength="60" type="text" name="EmailAuteur"/>
		</div>

		<div> 
			Titre du commentaire : 
			<input maxlength="60" type="text" name="TitrCom"/>
		</div>

		<div> 
			Contenue du commentaire : 
			<textarea type="text" name="LibCom"/></textarea>
		</div>

		<p> <input type="submit" name="Submit" value="Valider" /> <input type="hidden" name="NumArt" value="<?php echo $NumArt; ?>"></p>
	</form>
	
	<br>
</body>
</html>