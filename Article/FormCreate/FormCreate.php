<?php include "../../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php
	include "../../General/SelectList.php";
	include "../../General/GetOneEntry.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Écrire un Article - Au Bord Des Bars</title>
</head>
<body>

	<!-- Bouton Home -->
	<div> <form action="../../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>

	<?php if (isset($_GET['Not'])) {
		echo "Tout les champs ne sont pas rempli !";
	} ?>


	<div> <h1>Écrire un Article</h1> </div>

	<form action="FormCreate2.php" method="post" enctype="multipart/form-data" >

		<div> 
			Titre : 
			<input maxlength="100" type="text" name="LibTitrA" value="<?php if(isset($_SESSION['LibTitrA'])){echo $_SESSION['LibTitrA'];} ?>"/>
		</div>
		<div> 
			Chapo : 
			<textarea maxlength="500" type="text" name="LibChapoA"/><?php if(isset($_SESSION['LibChapoA'])){echo $_SESSION['LibChapoA'];} ?></textarea>
		</div>
		<div> 
			Accroche : 
			<input maxlength="100" type="text" name="LibAccrochA" value="<?php if(isset($_SESSION['LibAccrochA'])){echo $_SESSION['LibAccrochA'];} ?>" />
		</div>
		<div> 
			Paragraphe 1 : <textarea maxlength="1200" type="text" name="Parag1A"/><?php if(isset($_SESSION['Parag1A'])){echo $_SESSION['Parag1A'];} ?></textarea>
		</div>
		<div> 
			Sous-Titre 1 : <input maxlength="100" type="text" name="LibSsTitr1" value="<?php if(isset($_SESSION['LibSsTitr1'])){echo $_SESSION['LibSsTitr1'];} ?>"/>
		</div>
		<div> 
			Paragraphe 2 : <textarea maxlength="1200" type="text" name="Parag2A" /><?php if(isset($_SESSION['Parag2A'])){echo $_SESSION['Parag2A'];} ?></textarea>
		</div>
		<div> 
			Sous-Titre 2 : <input maxlength="100" type="text" name="LibSsTitr2" value="<?php if(isset($_SESSION['LibSsTitr2'])){echo $_SESSION['LibSsTitr2'];} ?>"/>
		</div>
		<div> 
			Paragraphe 3 : <textarea maxlength="1200" type="text" name="Parag3A" /><?php if(isset($_SESSION['Parag3A'])){echo $_SESSION['Parag3A'];} ?></textarea>
		</div>
		<div> 
			Conclusion : <textarea maxlength="800" type="text" name="LibConclA" /><?php if(isset($_SESSION['LibConclA'])){echo $_SESSION['LibConclA'];} ?></textarea>
		</div>

		<div> 
			UrlPhoto : <input type="file" name="File" />
		</div>

		<p> <input type="submit" name="Submit" value="Suivant" /></p>

</form>



	<form action="../AllArticle.php" method="post"> <input  type="submit" name="id" value="Retour à la liste des Articles" ></form> 
	
	<br>
</body>
</html>

<?php 
}
else{
	header('Location: ../../index.php');
	exit();
	} 

?>