<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 

	include "../General/connectionBD.php";
	include "../General/GetOneEntry.php"; 

	$Set = "LibTitrA = :LibTitrA, LibChapoA = :LibChapoA, LibAccrochA = :LibAccrochA, Parag1A = :Parag1A, LibSsTitr1 = :LibSsTitr1, Parag2A = :Parag2A, LibSsTitr2 = :LibSsTitr2, Parag3A = :Parag3A, LibConclA = :LibConclA, UrlPhotA = :UrlPhotA, NumAngl = :NumAngl, NumThem = :NumThem, NumLang = :NumLang" ; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE ARTICLE SET '.$Set.' WHERE NumArt ="'.$_POST['NumArt'].'" ');

		$NumAngl = GetOneEntry("NumAngl", "ANGLE", "LibAngl",$_POST['NomAngl']);
		$NumThem = GetOneEntry("NumThem", "THEMATIQUE", "LibThem",$_POST['NomThem']);
		$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST['NomLang']);

		if ($_FILES['File']['name']!=""){
			$targetDir = "../assets/image/";
			$imageArt = $_FILES['File']['name'];
			$path = pathinfo($imageArt);
			$filename = $_POST['NumArt'].str_replace(" ", "", substr($_POST["LibTitrA"], 0, 5));
			$temp_name = $_FILES['File']['tmp_name'];
			$path_filename_ext = $targetDir.$filename.".jpg";
			move_uploaded_file($temp_name,$path_filename_ext);
			$UrlPhotA = $path_filename_ext;
			echo "Congratulations! File Uploaded Successfully.";
		}
			
			if (!isset($UrlPhotA) ){
				$UrlPhotA = "";
			}


			if ($_FILES['File']['size'] == 0) {
				echo "test";
				$GetUrl = $DB->query('SELECT UrlPhotA FROM ARTICLE WHERE NumArt ="'.$_POST['NumArt'].'" ');
				$Url = $GetUrl->fetch();
				$UrlPhotA = $Url['UrlPhotA'];
			}


		$data = array(

				':LibTitrA'=> $_POST["LibTitrA"],
				':LibChapoA'=> $_POST["LibChapoA"],
				':LibAccrochA'=> $_POST["LibAccrochA"],
				':Parag1A'=> $_POST["Parag1A"],
				':LibSsTitr1'=> $_POST["LibSsTitr1"],
				':Parag2A'=> $_POST["Parag2A"],
				':LibSsTitr2'=> $_POST["LibSsTitr2"],
				':Parag3A'=> $_POST["Parag3A"],
				':LibConclA'=> $_POST["LibConclA"],
				':UrlPhotA'=> $UrlPhotA,
				':NumAngl'=> $NumAngl,
				':NumThem'=> $NumThem,
				':NumLang'=> $NumLang,

		);

		$insert->execute($data);
		$DB->commit();

		
	} catch (PDOException $e) {
		echo $e;
		$DB->rollBack();
	}



	$DB->beginTransaction();
	$insert = $DB->prepare("DELETE FROM MOTCLEARTICLE WHERE NumArt = :NumArt  ");
	$data = array(
		':NumArt'=>$_POST["NumArt"],

	);
	
	$insert->execute($data);
	$DB->commit();


	$NumArt = $_POST["NumArt"];

	$GetMot = $DB->query('SELECT * FROM MOTCLE');

	while ($Mot = $GetMot->fetch()) {
		if (isset($_POST[$Mot['NumMoCle']])) {
			$NumMoCle = $Mot['NumMoCle'];
			include "LinkMotCle.php";
		}
	}


		echo "Updated !";


	header('Location: ./AllArticle.php');
	exit();

?>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>