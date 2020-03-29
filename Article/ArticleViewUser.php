<?php session_start(); ?>
<?php 
	include "../General/connectionBD.php";
	include "../General/GetOneEntry.php";


	if (isset($_GET['NumArt'])) {
		$NumArt = $_GET['NumArt'];
	}
	elseif (isset($_POST['NumArt'])) {
		$NumArt = $_POST['NumArt'];
		
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link  href="./assets/css/lire.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

	<!-- Bouton Home -->
	<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "false"; ?>"></form> </div>

	<!-- Titre -->
	<div> <h2 class="title"> <?php echo $Article['LibTitrA'];?> </h2> </div> 

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


		</div>

<!-- Parties Likes -->

	<?php if (isset($_SESSION['IsConnect'])){ ?>
		
	
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
	



	<form action="ArticleViewUser.php" method="get"><input type="submit" name="Likes" value="Likes !"><input type="hidden" name="NumArt" value="<?php echo $NumArt ?>"></form>

	<?php 
		if (isset($_GET['Likes'])) {
			include "Likes.php";
		}

	 ?>
<?php } 
	else{ ?>

	<div>Connectez vous pour likez cette article !</div>

<?php } ?>
<!-- Parties Comment -->

	
	<?php include "CreateCom.php"; ?>


	<h3> COMMENTAIRE </h3>

	<?php 
		$GetComment = $DB->query('SELECT * FROM COMMENT WHERE NumArt ="'.$NumArt.'"  ');
		while ($Comment = $GetComment->fetch()) {
	?>

		<div> Écrit par : <?php echo $Comment['PseudoAuteur']; ?> | Date de création : <?php echo $Comment['DtCreC']; ?> </div>

		<div> <?php echo $Comment['TitrCom']; ?> </div>

		<div> <?php echo $Comment['LibCom']; ?> </div>


	<?php 
		}
	?>

	<?php if (isset($_SESSION['IsConnect'])){ ?>

	<?php
		include 'FormCreateCom.php';
	?> 

	<?php } else{ ?>

		<div>Connectez vous pour commentez ! !</div>

	<?php } ?>


<!-- Code pour la parti "D'Autre Article" -->


	<div> <h2> D'autres Articles </h2> </div>

	<?php

			$sqlRequete = 'SELECT * FROM ARTICLE LIMIT 2';
			$AllArticle = $DB->query($sqlRequete);

			while ($Article = $AllArticle->fetch()) {			
	?>
				<div style=" margin: 1rem;">

					<div> <img src="<?php echo $Article['UrlPhotA']; ?>"> </div>
					<div> <?php echo $Article['LibTitrA']; ?> </div>
					<div> <?php echo $Article['LibChapoA']; ?> </div>
					<div> <form action="../Article/ArticleViewUser.php" method="get"> <input  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

				</div>
	
	<?php } ?>



</body>
</html>


<?php
}
?>