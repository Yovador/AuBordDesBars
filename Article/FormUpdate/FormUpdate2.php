<?php include "../../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php

	include "../../General/connectionBD.php";

	if (isset($_POST['LibTitrA']) && isset($_POST['LibChapoA']) && isset($_POST['LibAccrochA']) && isset($_POST['Parag1A']) && isset($_POST['LibSsTitr1']) && isset($_POST['Parag2A']) && isset($_POST['LibSsTitr2']) && isset($_POST['Parag3A']) && isset($_POST['LibConclA']) ) {

		if ($_FILES['File']['name']!=""){
		$targetDir = "../../assets/image/";
		$imageArt = $_FILES['File']['name'];
		$path = pathinfo($imageArt);
		$filename = str_replace(" ", "", substr($_POST["LibTitrA"], 0, 10));
		$temp_name = $_FILES['File']['tmp_name'];
		$path_filename_ext = $targetDir.$filename.".jpg";

		if (file_exists($path_filename_ext)) {
			$UrlPhotA = $path_filename_ext;
			echo "Sorry, file already exists.";
		}
		else{
			move_uploaded_file($temp_name,$path_filename_ext);
			$UrlPhotA = $path_filename_ext;
			echo "Congratulations! File Uploaded Successfully.";
		}
		}
		
		if (!isset($UrlPhotA) ){
			$UrlPhotA = "";
		}

		$_SESSION['LibTitrA'] = $_POST['LibTitrA'];
		$_SESSION['LibChapoA'] = $_POST['LibChapoA'];
		$_SESSION['LibAccrochA'] = $_POST['LibAccrochA'];
		$_SESSION['Parag1A'] = $_POST['Parag1A'];
		$_SESSION['LibSsTitr1'] = $_POST['LibSsTitr1'];
		$_SESSION['Parag2A'] = $_POST['Parag2A'];
		$_SESSION['LibSsTitr2'] = $_POST['LibSsTitr2'];
		$_SESSION['Parag3A'] = $_POST['Parag3A'];
		$_SESSION['LibConclA'] = $_POST['LibConclA'];
		$_SESSION['UrlPhotA'] = $UrlPhotA;

	}


	


?>


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


	<div> <h1>Écrire un Article</h1> </div>

	<div> <h3>Choisisser une langue</h3> </div>


	<form action="FormUpdate3.php" method="post">
		<div>
			<select type="text" name="NomLang"> 
			<?php 
		 				
				if (isset($_SESSION['NomLang'])) {
					$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang", $_SESSION['NomLang'])
			?> 
	 			
	 				<option value=""> Choississez une Langue </option>
	 				<?php GetList("LANGUE", true ,$NumLang, "NumLang", "Lib1Lang", false, "", "") ?> 
	 			


			<?php
				}
				else{
			?>
	 				<option value=""> Choississez une Langue </option>
	 				<?php GetList("LANGUE", false ,"", "", "Lib1Lang", false, "", "") ?> 
			<?php
					$NumLang = "";
				}

			?>
			</select>
		</div>
		<p> <input type="submit" name="Submit" value="Suivant" /> </p>

</form>

	<form action="FormUpdate.php" method="post"> <input type="submit" name="retour" value="Retour"> </form>
		


	<form action="../AllArticle.php" method="post"> <input  type="submit" name="id" value="Annuler" ></form>

	
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