<!DOCTYPE html>
<html>
<head>
	<title>Au Bord Des Bars !</title>
</head>
<body>

	<?php include "./General/isAdmin.php" //$IsAdmin == true si Admin?>

	<?php 

		include "./General/connectionBD.php";
	?> 


<!--///////////////////////////// USER /////////////////////////////////// -->


		

	<?php
		if (!$isAdmin) {
			$sqlRequeteNew = 'SELECT * FROM ARTICLE WHERE DtCreA = (SELECT MAX(DtCreA) FROM ARTICLE)';

			$Newest = $DB->query($sqlRequeteNew);

			while ($NewArticle = $Newest->fetch()) {

	?>

		<h2>Le Dernier Article</h2>
				<div> 

					<img heigth="300px" src="<?php echo $NewArticle['UrlPhotA']; ?>"> 

					<!-- Titre -->
					<div> <?php echo $NewArticle['LibTitrA']; ?> </div>

					<!-- Chapo -->
					<div> <?php echo $NewArticle['LibChapoA']; ?> </div>


					<!-- Bouton Lire -->
					<div> <form action="./Article/ArticleViewUser.php" method="get"> <input  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $NewArticle['NumArt']; ?>"></form> </div>
				</div>

	<?php

			}
	?> 


	<!-- Parti tout les Articles -->


	
		<h2>Tout les Articles</h2>

	<?php

			$sqlRequeteAll = 'SELECT * FROM article ORDER BY DtCreA DESC';
			$AllArticle = $DB->query($sqlRequeteAll);

			while ($Article = $AllArticle->fetch()) {			
	?>
				<!-- Div d'un article  -->
				<div style="margin: 1rem;"> <!-- Style a enlevé  -->

					<!-- Image -->
					<div> <img src="<?php echo $Article['UrlPhotA']; ?>"> </div>

					<!-- Titre -->
					<div> <?php echo $Article['LibTitrA']; ?> </div>

					<!-- Chapo -->					
					<div> <?php echo $Article['LibChapoA']; ?> </div>

					<!-- Bouton lire -->
					<div> <form action="./Article/ArticleViewUser.php" method="get"> <input  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

				</div>
	
	<?php
			}
	
		}

	?>

<!--///////////////////////////// ADMIN /////////////////////////////////// -->
	
	<?php 
		if ($isAdmin) {
	?>

	<div>

		<form action="./Article/FormCreate.php" method="post"> <input  type="submit" name="id" value="Écrire un article" ></form>

		<form action="./Langue/AllLangue.php" method="post"> <input  type="submit" name="id" value="Langue" ></form>

		<form action="./Angle/AllAngle.php" method="post"> <input  type="submit" name="id" value="Angle" ></form>


		<form action="./Thematique/AllTheme.php" method="post"> <input  type="submit" name="id" value="Theme" ></form>



	</div>

	<h2>Les Articles</h2>
	<?php

			$sqlRequeteAll = 'SELECT * FROM article ORDER BY DtCreA DESC';
			$AllArticle = $DB->query($sqlRequeteAll);

			while ($Article = $AllArticle->fetch()) {			
	?>

				<div style="margin: 1rem;">

					<!-- Image -->
					<div> <img src="<?php echo $Article['UrlPhotA']; ?>"> </div>

					<!-- Titre -->
					<div> <?php echo $Article['LibTitrA']; ?> </div>

					<!-- Chapo -->					
					<div> <?php echo $Article['LibChapoA']; ?> </div>

					<!-- Bouton lire -->
					<div> <form action="./Article/ArticleViewAdmin.php" method="get"> <input  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./Article/FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Article/Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>


				</div>

	<?php
			}
		}

	 ?>






</body>
</html>