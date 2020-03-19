<!DOCTYPE html>
<html>
<head>
	<title>Tout les articles - Au Bord des Barsx</title>
</head>
<body>

		<!-- Bouton Home -->
	<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>


	<?php include "../General/connectionBD.php"; ?>

	<h2>Les Articles</h2>

	<form action="./AllArticle.php" method="post"> <input  type="submit" name="id" value="Voir La listes des Articles" ></form>

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
					<div> <form action="./ArticleViewAdmin.php" method="get"> <input  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>


				</div>

	<?php
			}
	?>

	<?php include "../General/connectionBD.php"; ?>

	<h2>Les Articles</h2>

	<form action="./AllArticle.php" method="post"> <input  type="submit" name="id" value="Voir La listes des Articles" ></form>

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
					<div> <form action="./ArticleViewAdmin.php" method="get"> <input  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form> </div>


				</div>

	<?php
			}
	?>

</body>
</html>
			
