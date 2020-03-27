<?php include "../../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php include "../../General/connectionBD.php";

	if (isset($_POST['NomLang'])) {
		$_SESSION['NomLang'] = $_POST['NomLang'];
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

	<div> <h3>Choisisser un angle et un thème</h3> </div>


	<form action="FormCreate4.php" method="post" enctype="multipart/form-data" >

		<div>
 			
				<div>Angle :</div>
		<?php 
	 			 
	 			if (isset($_SESSION['NomAngl'])) {
	 				$NumAngl = GetOneEntry("NumAngl", "ANGLE", "LibAngl", $_SESSION['NomAngl'])
		?>	

			 			<select type="text" name="NomAngl"> 
			 				<option value=""> Choississez un Angle </option>
			 				<?php GetList("ANGLE", true ,$NumAngl, "NumAngl", "LibAngl", true, "NumLang", $NumLang ) ?> 
			 			</select>

	 	<?php
	 			}
	 			else{
	 	?>
					
	 					
			 			<select type="text" name="NomAngl">
			 				<option value=""> Choississez un Angle </option>
			 				<?php GetList("ANGLE", false ,"", "", "LibAngl", true, "NumLang", $NumLang ) ?> 
			 			</select>
		<?php
	 			}
	 	?>
	 	</div>

	 	<div>
 		
				<div>Thème :</div>
		<?php 
	 			 
	 			if (isset($_SESSION['NomThem'])) {
	 				$NumThem = GetOneEntry("NumThem", "THEMATIQUE", "LibThem", $_SESSION['NomThem'])
		?>	

			 			<select type="text" name="NomThem"> 
			 				<option value=""> Choississez un Theme </option>
			 				<?php GetList("THEMATIQUE", true ,$NumThem, "NumThem", "LibThem", true, "NumLang", $NumLang ) ?> 
			 			</select>

	 	<?php
	 			}
	 			else{
	 	?>
					
	 					
			 			<select type="text" name="NomThem">> 
			 				<option value=""> Choississez un Theme </option>
			 				<?php GetList("THEMATIQUE", false ,"", "", "LibThem", true, "NumLang", $NumLang ) ?> 
			 			</select>
		<?php
	 			}
	 	?>
	 	</div>

		<p> <input type="submit" name="Submit" value="Suivant" /></p>

</form>

	<form action="FormCreate2.php" method="post"> <input type="submit" name="retour" value="Retour"> </form>


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