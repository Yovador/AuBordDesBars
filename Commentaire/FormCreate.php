<?php
include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>BlogArt - Ajouter un Commentaire</title>
</head>
<body>
	<h1>Ajouter un Commentaire:</h1> <br>

	<form action="Create.php" method="post">
		<p> Pseudo auteur : <input type="text" name="PseudoAuteur" /> </p>
		<p> Mail auteur : <input type="text" name="EmailAuteur" /> </p>
		<p> Titre Commentaire : <input type="text" name="TitrCom" /> </p>
		<p> Contenue Commentaire : <input type="text" name="LibCom" /> </p>
 		<p>
 			NumArt : 
 			<select type="text" name="NomArt"> 
 				<option value=""> Choississez un Article </option>
 				<?php GetList("ARTICLE", false ,"", "", "LibTitrA") ?> 
 			</select>
 		</p>
		<p><input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="Select.php"><input type="submit" value="Retour"></form></p>
	
	<br>
</body>
</html>

