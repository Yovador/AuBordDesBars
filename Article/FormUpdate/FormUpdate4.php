<?php include "../../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php include "../../General/connectionBD.php";

	if (!isset($_SESSION['MotCle'])) {
		$_SESSION['MotCle'] = array();
	}

	if (isset($_POST['NomAngl']) && isset($_POST['NomThem'])) {
		$_SESSION['NomAngl'] = $_POST['NomAngl'];
		$_SESSION['NomThem'] = $_POST['NomThem'];
	}


?>

<?php
	include "../../General/SelectList.php";
	include "../../General/GetOneEntry.php";
	$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang", $_SESSION['NomLang']);



?>

<!DOCTYPE html>
<html>
<head>
	<title>Écrire un Article - Au Bord Des Bars</title>
</head>
<body>

	<!-- Bouton Home -->
	<div> <form action="../../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>


	<div> <h1>Écrire un Article</h1> </div>

	<div> <h3>Ajouter des mots clés !</h3> </div>

	<div>
		<form action="FormUpdate4.php" method="post">

			<select type="text" name="NomMotCle"> 
			<?php 
		 			 
	 			if (isset($_POST['NomMotCle'])) {
	 				$NumMoCle = GetOneEntry("NumMoCle", "MOTCLE", "LibMoCle", $_POST['NomMotCle'])
			?>		
	 				<option value=""> Choississez un Mot Clé </option>
	 				<?php GetList("MOTCLE", true ,$NumMoCle, "NumMoCle", "LibMoCle", true, "NumLang", $NumLang ) ?> 
	 			

		 	<?php
	 			}
	 			else{
		 	?>
	 				<option value=""> Choississez un  Mot Clé </option>
	 				<?php GetList("MOTCLE", false ,"", "", "LibMoCle", true, "NumLang", $NumLang ) ?> 
			<?php
	 			}
		 	?>
		 	</select>

		<input type="submit" name="Motclé" value="Ajouter un mot clé !">
		</form>
	</div>


	<div>Mot clé présent :</div>
	<?php 
		if (isset($_POST["Motclé"]) && $_POST["NomMotCle"] != "" && !in_array($_POST["NomMotCle"], $_SESSION['MotCle'])) {
			array_push($_SESSION['MotCle'], $_POST['NomMotCle']);
		}


		if (isset($_POST["destroy"])) {
			unset($_SESSION['MotCle'][$_POST['Target']]);
		}

		if (!empty($_SESSION['MotCle'])) {
			foreach ($_SESSION['MotCle'] as $key => $value) {
		?>
			<div>
				<form action="FormUpdate4.php" method="post"> <?php echo $value; ?> <input type="submit" name="destroy" value="Retiré le mot clé"> <input type="hidden" name="Target" value="<?php echo $key ?>"></form>
			</div>

		<?php 			
			}
		}
		?>
		



	<form action="../Update.php" method="post"> <input type="submit" name="suivant" value="Suivant"> </form>


	<form action="FormUpdate3.php" method="post"> <input type="submit" name="retour" value="Retour"> </form>


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