<?php  include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";
$primKey = "NumCom";
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_POST[$primKey]; ?> - Détails</title>
</head>

<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

	$request = $DB->query('SELECT * FROM COMMENT WHERE '.$primKey.' = "'.$_POST[$primKey].'" ');

	while ($GetInfo = $request->fetch()) {
	?>
		<h2>Num Theme</h2>
		<p><?php echo $GetInfo['NumCom']; ?></p>
		<h3>Date de création</h3>
		<p><?php echo $GetInfo['DtCreC']; ?></p>
		<h3>Pseudo Auteur</h3>
		<p><?php echo $GetInfo['PseudoAuteur']; ?></p>
		<h3>Mail Auteur</h3>
		<p><?php echo $GetInfo['EmailAuteur']; ?></p>
		<h3>Titre Commentaire</h3>
		<p><?php echo $GetInfo['TitrCom']; ?></p>
		<h3>Libellé Commentaire</h3>
		<p><?php echo $GetInfo['LibCom']; ?></p>
		<h3>Article associé</h3>
		<p><?php echo GetOneEntry("LibTitrA", "ARTICLE", "NumArt",$GetInfo['NumArt']);?></p>
		<p><form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey; ?>" value="<?php echo $GetInfo[$primKey] ?>" >
	     </form></p>
		<p><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="<?php echo $primKey; ?>" value="<?php echo $GetInfo[$primKey] ?>"></form></p>
		<p><form action="Select.php"><input type="submit" value="Retour"></form></p>
	    


	<?php
	}
	?>
</body>
</html>