<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php

	include "../General/GetOneEntry.php";
	include "../General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['LibTitrA'] != "" && $_POST['NomLang'] != "" && $_POST['NomAngl'] != "" && $_POST['NomThem'] != "" && $_POST['Parag1A'] != "" ){
				include "../General/connectionBD.php";
				try {

					echo $_POST['NomThem'], "<br>";
					
					$NumAngl = GetOneEntry("NumAngl", "ANGLE", "LibAngl",$_POST['NomAngl']);
					$NumThem = GetOneEntry("NumThem", "THEMATIQUE", "LibThem",$_POST['NomThem']);
					$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST['NomLang']);
					$Likes = 0;


					echo $NumThem , "<br>" , "<br>";


					include "NumArtAndDuplicateCheck.php";

					echo $NumArt , "<br>" , "<br>";
					
					date_default_timezone_set('Europe/Paris');
					$DtCreA = date('Y-m-j');

					if ($_FILES['File']['name']!=""){
						$targetDir = "../assets/image";
						$imageArt = $_FILES['File']['name'];
						$path = pathinfo($imageArt);
						$filename = $NumArt.str_replace(" ", "", substr($_POST["LibTitrA"], 0, 5));
						$ext = $path['extension'];
						$temp_name = $_FILES['File']['tmp_name'];
						$path_filename_ext = $targetDir.$filename.".".$ext;
				
						if (file_exists($path_filename_ext)) {
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

					
					$row = "NumArt, DtCreA, LibTitrA, LibChapoA, LibAccrochA, Parag1A, LibSsTitr1, Parag2A, LibSsTitr2, Parag3A, LibConclA, UrlPhotA, Likes, NumAngl, NumThem, NumLang";
					$var = " :NumArt, :DtCreA, :LibTitrA, :LibChapoA, :LibAccrochA, :Parag1A, :LibSsTitr1, :Parag2A, :LibSsTitr2, :Parag3A, :LibConclA, :UrlPhotA, :Likes, :NumAngl, :NumThem, :NumLang";


					if ($CanSend) {
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO ARTICLE ($row) VALUES($var);");

						$data = array(
							':NumArt'=> $NumArt,
							':DtCreA'=> $DtCreA,
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
							':Likes'=> $Likes,
							':NumAngl'=> $NumAngl,
							':NumThem'=> $NumThem,
							':NumLang'=> $NumLang,
						);

						$insert->execute($data);
						$DB->commit();
					}
					else{
						echo "DUPLICATE";
					}




				
				} 

				catch (PDOException $e) {
					echo $e;
					$DB->rollBack();
				}
				
				$GetMot = $DB->query('SELECT * FROM MOTCLE');

				while ($Mot = $GetMot->fetch()) {
					if (isset($_POST[$Mot['NumMoCle']])) {
						$NumMoCle = $Mot['NumMoCle'];
						include "LinkMotCle.php";
					}
				}

			}

			else {
				echo "<div style='color : red;'> Tout les champs ne sont pas rempli ! </div>";
			}
		}

	}

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