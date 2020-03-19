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

<!-- TOUT LES STYLES PRESENT SUR DU HTML SONT A ENLEVÉ -->
<!--///////////////////////////// USER /////////////////////////////////// -->

	<!-- Bouton Home -->
	<div> <form action="./index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo $isAdmin; ?>"></form> </div>
	

	<?php
		if (!$isAdmin) {
			$sqlRequeteNew = 'SELECT * FROM ARTICLE WHERE DtCreA = (SELECT MAX(DtCreA) FROM ARTICLE)';

			$Newest = $DB->query($sqlRequeteNew);

			while ($NewArticle = $Newest->fetch()) {

	?>

		<h2>Le Dernier Article</h2>
				<div style="margin: 1rem; background-color: #EAE9EE ; " > 

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
				<div style="margin: 1rem; background-color: #EAE9EE ; " > <!-- Style a enlevé  -->

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

		<h2>Tableau de Bord</h2>

	<div style="margin: 1rem; ">
		Écrire un article ou voir la liste complète pour les modifier
		<form action="./Article/FormCreate.php" method="post"> <input  type="submit" name="id" value="Écrire un article" ></form>
		<form action="./Article/AllArticle.php" method="post"> <input  type="submit" name="id" value="Voir La listes des Articles" ></form>

	</div>

	<div style="margin: 1rem; background-color: #EAE9EE ; ">

		<div style="margin: 1rem; ">
			Langues : <form action="./Langue/FormCreate.php" method="post"> <input  type="submit" name="id" value="Ajouter une Langue" ></form>
					<form action="./Langue/AllLangue.php" method="post"> <input  type="submit" name="id" value="Voir La liste des Langues" ></form> 
		</div>

		<div style="margin: 1rem; ">
			Angles : <form action="./Angle/FormCreate.php" method="post"> <input  type="submit" name="id" value="Ajouter un Angle" ></form>
					<form action="./Angle/AllAngle.php" method="post"> <input  type="submit" name="id" value="Voir la liste des Angles" ></form>
		</div>
		

		<div style="margin: 1rem; ">
			Thèmes : <form action="./Thematique/FormCreate.php" method="post"> <input  type="submit" name="id" value="Ajouter un Thème" ></form>
					<form action="./Thematique/AllTheme.php" method="post"> <input  type="submit" name="id" value="Voir la liste des Thèmes" ></form>
		</div>
	
	</div>


	<?php
		}

	 ?>






</body>
</html>