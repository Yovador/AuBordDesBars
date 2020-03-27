<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php include "../General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<title>Créer un Commentaire - Au Bord Des Bars</title>
</head>
<body>

	<div> <h1>Créé un Commentaire</h1> </div>

	<form action="Create.php" method="post">
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

		<div> 
			Article:
			<select type="text" name="LibTitrA"> 
				<option value=""> Choississez un article </option>
				<?php GetList("ARTICLE", false ,"", "", "LibTitrA", false, "", "")?>
			</select>
		</div>

		<p> <input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="./AllComment.php"><input type="submit" value="Retour"></form></p>
	
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