<!DOCTYPE html>
<html>
<head>
	<title>Au Bord Des Bars !</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link  href="assets/css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">


</head>
<body>
<!-- contour -->
<div class="bordures">
	<div class="vertical-line">
		<div class="left-border"><span></span></div>
		<div class="right-border"><span></span></div>	
	</div>
		<div class="top-border"><hr></div>
</div>


<div class="header">	
	<?php include "./General/isAdmin.php" //$IsAdmin == true si Admin?>

	<?php 

		include "./General/connectionBD.php";
	?> 

<!-- TOUT LES STYLES PRESENT SUR DU HTML SONT A ENLEVÉ -->
<!--///////////////////////////// USER /////////////////////////////////// -->

	<!-- Bouton Home -->
	
	<div id="titre" > <form action="./index.php" method="post"> 
				<input id="boutonBars" type="submit" name="id" value="Au Bord Des Bars" > 
				<span>
				<input type="hidden" name="isAdmin" value="<?php echo $isAdmin; ?>">
			</form> 
		</div>

	<!-- /bouton home -->
		
</div>

		<?php
			if (!$isAdmin) {
				$sqlRequeteNew = 'SELECT * FROM ARTICLE WHERE DtCreA = (SELECT MAX(DtCreA) FROM ARTICLE)';

				$Newest = $DB->query($sqlRequeteNew);

				while ($NewArticle = $Newest->fetch()) {

		?>
	
<div class="dernierarticle">
	<h2>Le Dernier Article</h2>
		
			<div class="card" >
				<div class="background">	
				  <img src="..." class="card-img-top" alt="...">
				  <div class="card-body">
				    	<!-- Titre -->
						<h5 class="card-title"><?php echo $NewArticle['LibTitrA']; ?></h5>
				    	<!-- Chapo -->
						<p class="card-text"style="width: 18rem;"><?php echo $NewArticle['LibChapoA']; ?></p>
				  		<!-- Bouton Lire -->
				   		<form action="./Article/ArticleViewUser.php" method="get"> <input class="btn btn-primary"  type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $NewArticle['NumArt']; ?>"></form>
				  </div>
				</div>
			</div>
			<img heigth="300px" src="<?php echo $NewArticle['UrlPhotA']; ?>"> 
			
			
			
			
			
			
</div>

	<?php

			}
	?> 
	</div>


	<!-- Partie tout les Articles -->


	<div class="touslesarticles">
		<h2>Tous les articles</h2>
			<hr>
	<?php

			$sqlRequeteAll = 'SELECT * FROM article ORDER BY DtCreA DESC';
			$AllArticle = $DB->query($sqlRequeteAll);

			while ($Article = $AllArticle->fetch()) {			
	?>
				<!-- Div d'un article  -->

		<div class="card">
			<div class="background">
				<!-- Image -->  
				<img src="<?php echo $Article['UrlPhotA']; ?>" class="card-img-top" alt="...">
				<div class="card-body">
					<!-- Titre -->
				 	<h5 class="card-title"><?php echo $Article['LibTitrA']; ?></h5>
					<!-- Chapo -->
					<p class="card-text" style="width: 18rem;"><?php echo $Article['LibChapoA']; ?></p>
					<!-- Bouton lire -->
					<form action="./Article/ArticleViewUser.php" method="get"> <input class="btn btn-primary" type="submit" name="id" value="Lire l'article !" > <input  type="hidden" name="NumArt" value="<?php echo $Article['NumArt']; ?>"></form>
				</div>
			</div>						
		</div>

	<?php
			}
	
		}

	?>
	</div>

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

		<div style="margin: 1rem; ">
			Commentaires : <form action="./Commentaire/FormCreate.php" method="post"> <input  type="submit" name="id" value="Ajouter un Commentaire" ></form>
					<form action="./Commentaire/AllComment.php" method="post"> <input  type="submit" name="id" value="Voir la liste des Commentaires" ></form>
		</div>

		<div style="margin: 1rem; ">
			Mots-Clés : <form action="./MotCle/FormCreate.php" method="post"> <input  type="submit" name="id" value="Ajouter un Mot-Clé" ></form>
					<form action="./MotCle/AllMot.php" method="post"> <input  type="submit" name="id" value="Voir la liste des Mots-Clés" ></form>
		</div>
	
		<div style="margin: 1rem; ">
			User : <form action="./User/FormCreate.php" method="post"> <input  type="submit" name="id" value="Ajouter un user" ></form>
					<form action="./User/AllUser.php" method="post"> <input  type="submit" name="id" value="Voir la liste des user" ></form>
		</div>

	</div>


	<?php
		}

	 ?>





	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class="footer">
	<div class="menugauche">
		<ul>
			<li><a href="">Contact</a></li>
			<li><a href="">Archives</a></li>
			<li><a href="">1 rue Jacques Ellul, 33800 Bordeaux</a></li>
		</ul>
	</div>
	<div class="grostitre"><a href="">Au bord des bars</a>
</div>
	<div class="menudroite">
		<ul>
			<li><a href="">Mentions légales</a></li> 
			<li><a href="">Protection des données</a></li>
			<li><a href="">CGU</a></li>
		</ul>
	</div>
</div>
</body>
</html>