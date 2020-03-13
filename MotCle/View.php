<?php  include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";
$primKey = "NumMoCle";
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_POST[$primKey]; ?> - Détails</title>
</head>

<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

	$request = $DB->query('SELECT * FROM MOTCLE WHERE '.$primKey.' = "'.$_POST[$primKey].'" ');

	while ($GetInfo = $request->fetch()) {
	?>
		<h2>Num Theme</h2>
		<p><?php echo $GetInfo['NumMoCle']; ?></p>
		<h3>Nom Theme</h3>
		<p><?php echo $GetInfo['LibMoCle']; ?></p>
		<h3>Pays</h3>
		<p><?php echo GetOneEntry("Lib1Lang", "LANGUE", "NumLang",  $GetInfo['NumLang'])?></p>
		<p><form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey; ?>" value="<?php echo $GetInfo[$primKey] ?>" >
	     </form></p>
		<p><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="<?php echo $primKey; ?>" value="<?php echo $GetInfo[$primKey] ?>"></form></p>
		<p><form action="Select.php"><input type="submit" value="Retour"></form></p>
	    


	<?php
	}
	?>
</body>
</html>