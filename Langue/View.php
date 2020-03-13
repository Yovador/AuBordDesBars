<?php  include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_POST['NumLang']; ?> - Détails</title>
</head>

<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

	$request = $DB->query('SELECT * FROM LANGUE WHERE NumLang ="'.$_POST['NumLang'].'" ');

	while ($GetInfo = $request->fetch()) {
	?>
		<h2>Libellé Court</h2>
		<p><?php echo $GetInfo['Lib1Lang']; ?></p>
		<h3>Libellé Long</h3>
		<p><?php echo $GetInfo['Lib2Lang']; ?></p>
		<h3>Pays</h3>
		<p><?php echo GetOneEntry("frPays", "PAYS", "numPays",  $GetInfo['NumPays'])?></p>
		<p><form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumLang" value="<?php echo $GetInfo['NumLang'] ?>" >
	     </form></p>
		<p><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumLang" value="<?php echo $GetInfo['NumLang'] ?>"></form></p>
		<p><form action="Select.php"><input type="submit" value="Retour Langue"></form></p>
	    


	<?php
	}
	?>
</body>
</html>