<?php
include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>BlogArt - Ajouter une Langue</title>
</head>
<body>
	<h1>Ajouter une Langue :</h1> <br>

	<form action="Create.php" method="post">
		<p> Libellé Court : <input type="text" name="Lib1Lang" /> </p>
 		<p> Libellé Long : <input type="text" name="Lib2Lang"/> </p>
 		<p>
 			Pays : 
 			<select type="text" name="frPays"> 
 				<option value=""> Choississez un pays... </option>
 				<?php GetList("PAYS", false ,"", "numPays", "frPays") ?> 
 			</select>
 		</p>
		<p><input type="submit" name="Submit" value="Valider" /></p>
	</form>

	<p><form action="Select.php"><input type="submit" value="Retour Langue"></form></p>
	
	<br>
</body>
</html>

