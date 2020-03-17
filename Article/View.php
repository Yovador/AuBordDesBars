<?php  include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";
$primKey = "NumArt";
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_POST[$primKey]; ?> - Détails</title>
</head>

<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

	$request = $DB->query('SELECT * FROM ARTICLE WHERE '.$primKey.' = "'.$_POST[$primKey].'" ');

	while ($GetInfo = $request->fetch()) {
	?>
		<h2>Num Art</h2>
		<p> <?php echo $GetInfo['NumArt']; ?> </p>
		<h3>Date création</h3>
		<p> <?php echo $GetInfo['DtCreA']; ?> </p>
	    <h3>Titre</h3>
	    <p> <?php echo $GetInfo['LibTitrA']; ?> </p>
	    <h3>Chapo</h3>
	    <p> <?php echo $GetInfo['LibChapoA']; ?> </p>
	    <h3>Accroche</h3>
	    <p> <?php echo $GetInfo['LibAccrochA']; ?> </p>	    
	    <h3>Paragraphe 1</h3>
	    <p> <?php echo $GetInfo['Parag1A']; ?> </p>
	    <h3>Sous titre 1</h3>
	    <p> <?php echo $GetInfo['LibSsTitr1']; ?> </p>
	    <h3>Paragraphe 2</h3>
	    <p> <?php echo $GetInfo['Parag2A']; ?> </p>
	    <h3>Sous Titre 2</h3>
	    <p> <?php echo $GetInfo['LibSsTitr2']; ?> </p>
	    <h3>Paragraphe 3</h3>
	    <p> <?php echo $GetInfo['Parag3A']; ?> </p>
	    <h3>Conclusion</h3>
	    <p> <?php echo $GetInfo['LibConclA']; ?> </p>
	    <h3>Lien Photo</h3>
	    <p> <?php echo $GetInfo['UrlPhotA']; ?> </p>
	    <h3>Likes</h3>
	    <p> <?php echo $GetInfo['Likes']; ?> </p>
	    <h3>Angle</h3>
	    <p><?php echo GetOneEntry("LibAngl", "ANGLE", "NumAngl",$GetInfo['NumAngl']);?></p>
	    <h3>Theme</h3>
	    <p><?php echo GetOneEntry("LibThem", "THEMATIQUE", "NumThem",$GetInfo['NumThem']);?></p>
	    <h3>Langue</h3>
	    <p><?php echo GetOneEntry("Lib1Lang", "LANGUE", "NumLang",$GetInfo['NumLang']);?></p>
		



		<p><form action="FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey; ?>" value="<?php echo $GetInfo[$primKey] ?>" >
	     </form></p>
		<p><form action="Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="<?php echo $primKey; ?>" value="<?php echo $GetInfo[$primKey] ?>"></form></p>
		<p><form action="Select.php"><input type="submit" value="Retour"></form></p>
	    


	<?php
	}
	?>
</body>
</html>