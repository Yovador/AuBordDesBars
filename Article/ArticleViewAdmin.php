<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 
	include "../General/connectionBD.php";
	include "../General/GetOneEntry.php";

	if(isset($_GET['NumArt'])){
		$NumArt = $_GET['NumArt'];
	}


	$SelectArticle = $DB->query("SELECT * FROM ARTICLE WHERE NumArt = '".$NumArt."'");


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
	<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>

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

		$SelectMotCle = $DB->query('SELECT * FROM MOTCLEARTICLE WHERE NumArt = "'.$NumArt.'"');

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

	<?php
		$GetLikes = $DB->query('SELECT * FROM ARTICLE WHERE NumArt = "'.$NumArt.'" ');

		while ($Likes = $GetLikes->fetch()) {
	?>

			<div>
				Likes : <?php if($Likes['Likes']!=""){echo $Likes['Likes'];} else{echo 0;} ?>				
			</div>

	<?php
		}
	?>

	<h3> COMMENTAIRE </h3>

	<?php if (isset($_GET['Destroy'])) {
		include 'DeleteCom.php';
	} ?>

	<?php 
		$GetComment = $DB->query('SELECT * FROM COMMENT WHERE NumArt ="'.$NumArt.'"  ');
		while ($Comment = $GetComment->fetch()) {
	?>

		<div> Écrit par : <?php echo $Comment['PseudoAuteur']; ?> | Date de création : <?php echo $Comment['DtCreC']; ?> </div>

		<div> <?php echo $Comment['TitrCom']; ?> </div>

		<div> <?php echo $Comment['LibCom']; ?> </div>

		<div> <form action="./ArticleViewAdmin.php" method="GET"> <input type="submit" name="Destroy" value="Supprimer"> <input type="hidden" name="Target" value="<?php echo $Comment['NumCom']; ?>"><input type="hidden" name="NumArt" value="<?php echo $NumArt ?>"> </form> </div>



	<?php 
		}
	?> 

		</div>

				<!-- Bouton Modifier -->
		<div> <form action="./FormUpdate/GetInfo.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

		<!-- Bouton Supprimer -->
		<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

		<form action="./AllArticle.php" method="post"> <input  type="submit" name="id" value="Retour à la liste des Articles" ></form> 




</body>
</html>


<?php
}
?>


<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>