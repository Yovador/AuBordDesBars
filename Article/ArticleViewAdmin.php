<?php 
	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
	include $_SERVER['DOCUMENT_ROOT']."./General/GetOneEntry.php";


	$SelectArticle = $DB->query("SELECT * FROM ARTICLE WHERE NumArt = '".$_GET['NumArt']."'");

	while ($Article = $SelectArticle->fetch()) {
		$LibAngl = GetOneEntry("LibAngl", "ANGLE", "NumAngl", $Article['NumAngl']);
		$LibThem = GetOneEntry("LibThem", "THEMATIQUE", "NumThem", $Article['NumThem']);
		$Lib1Lang = GetOneEntry("Lib1Lang", "LANGUE", "NumLang", $Article['NumLang']);

?>

<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $Article['LibTitrA'];?> - Au Bord des Bars </title>
</head>
<body>


	<!-- Bouton Home -->
	<div> <a href="../index.php"> Home </a> </div>

	<!-- Titre -->
	<div> <h2> <?php echo $Article['LibTitrA'];?> </h2> </div> 

	<!-- Angle | Theme | Langue -->
	<div> <?php echo $LibAngl; ?> | <?php echo $LibThem; ?> | <?php echo $Lib1Lang; ?> </div> 

	<!-- Url Photo -->
	<div> <img src="<?php echo $Article['UrlPhotA'];?>"> </div>

	<!-- Chapo -->
	<div> <h3> <?php echo $Article['LibChapoA'];?></h3> </div>

	<!-- Accroche -->
	<div> <?php echo $Article['LibAccrochA'];?> </div>

	<!-- Paragraphe 1 -->
	<div> <?php echo $Article['Parag1A'];?> </div>

	<!-- Sous Titre 1 -->
	<div> <h3> <?php echo $Article['LibSsTitr1'];?> </h3> </div>

	<!-- Paragraphe 2 -->
	<div> <?php echo $Article['Parag2A'];?> </div>

	<!-- Sous Titre 2 -->
	<div> <h3> <?php echo $Article['LibSsTitr2'];?> </h3> </div>

	<!-- Paragraphe 3 -->
	<div> <?php echo $Article['Parag3A'];?> </div>

	<!-- Conclusion -->
	<div> <?php echo $Article['LibConclA'];?> </div>


<!-- Code pour la partie Mot clé -->

	<?php 

		$SelectMotCle = $DB->query('SELECT * FROM MOTCLEARTICLE WHERE NumArt = "'.$_GET['NumArt'].'"');

		$ListMotCle[] = array();

		while ($MotCle = $SelectMotCle->fetch()) {
			array_push($ListMotCle, GetOneEntry("LibMoCle", "MOTCLE", "NumMoCle", $MotCle['NumMoCle']) );
		}
	?>

		<div>
	<?php
			foreach ($ListMotCle as $key => $value) {
				if ($key !=0) {
				
					if ($value == end($ListMotCle)) {
						echo $value;
					}
					else{
						echo $value, " / ";
					}
				}
			}
	?>


		</div>

		<div> <form action="./FormCreate.php" method="get"> <input  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

				<!-- Bouton Modifier -->
		<div> <form action="./Article/FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

		<!-- Bouton Supprimer -->
		<div> <form action="./Article/Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>



</body>
</html>


<?php
}
?>