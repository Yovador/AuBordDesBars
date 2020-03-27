<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php

	include "../General/GetOneEntry.php";
	include "../General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
			include "../General/connectionBD.php";
			try {
			
				$NumAngl = GetOneEntry("NumAngl", "ANGLE", "LibAngl",$_SESSION['NomAngl']);
				$NumThem = GetOneEntry("NumThem", "THEMATIQUE", "LibThem",$_SESSION['NomThem']);
				$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_SESSION['NomLang']);
				$UrlPhotA = $_SESSION['UrlPhotA'];
				$Likes = 0;



				include "NumArtAndDuplicateCheck.php";

				echo $NumArt , "<br>" , "<br>";
				
				date_default_timezone_set('Europe/Paris');
				$DtCreA = date('Y-m-j');

				
				$row = "NumArt, DtCreA, LibTitrA, LibChapoA, LibAccrochA, Parag1A, LibSsTitr1, Parag2A, LibSsTitr2, Parag3A, LibConclA, UrlPhotA, Likes, NumAngl, NumThem, NumLang";
				$var = " :NumArt, :DtCreA, :LibTitrA, :LibChapoA, :LibAccrochA, :Parag1A, :LibSsTitr1, :Parag2A, :LibSsTitr2, :Parag3A, :LibConclA, :UrlPhotA, :Likes, :NumAngl, :NumThem, :NumLang";


				if ($CanSend) {
					$DB->beginTransaction();

					$insert = $DB->prepare("INSERT INTO ARTICLE ($row) VALUES($var);");

					$data = array(
						':NumArt'=> $NumArt,
						':DtCreA'=> $DtCreA,
						':LibTitrA'=> $_SESSION["LibTitrA"],
						':LibChapoA'=> $_SESSION["LibChapoA"],
						':LibAccrochA'=> $_SESSION["LibAccrochA"],
						':Parag1A'=> $_SESSION["Parag1A"],
						':LibSsTitr1'=> $_SESSION["LibSsTitr1"],
						':Parag2A'=> $_SESSION["Parag2A"],
						':LibSsTitr2'=> $_SESSION["LibSsTitr2"],
						':Parag3A'=> $_SESSION["Parag3A"],
						':LibConclA'=> $_SESSION["LibConclA"],
						':UrlPhotA'=> $UrlPhotA,
						':Likes'=> $Likes,
						':NumAngl'=> $NumAngl,
						':NumThem'=> $NumThem,
						':NumLang'=> $NumLang,
					);

					$insert->execute($data);
					$DB->commit();

					foreach ($_SESSION['MotCle'] as $key => $value) {
						$NumMoCle = GetOneEntry("NumMoCle", "MOTCLE", "LibMoCle", $value);
						include "LinkMotCle.php";
					}

					include "../General/UnsetCreate.php";


					header('Location: ./AllArticle.php');
					exit();

				}
				else{
					echo "DUPLICATE";
				}




			
			} 

			catch (PDOException $e) {
				echo $e;
				$DB->rollBack();
			}

	}


?>

<?php 
}
else{
	//header('Location: ../../index.php');
	//exit();
	} 

?>