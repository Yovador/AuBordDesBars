<?php 

	include "FormCreate.php";
	include "../General/GetOneEntry.php";
	include "../General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['LibThem'] != "" && $_POST['Lib1Lang'] != ""){
				include "../General/connectionBD.php";
				try {
					
					$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST["Lib1Lang"]);

					include "NumThemeAndDuplicateCheck.php";

					if ($CanSend) {
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO THEMATIQUE (NumThem, LibThem, NumLang) VALUES(:NumThem, :LibThem, :NumLang);");

						$data = array(
							':NumThem'=>$NumThem,
							':LibThem'=>$_POST["LibThem"],
							':NumLang'=>$NumLang,

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
			}
			else {
				echo "<div style='color : red;'> Tout les champs ne sont pas rempli ! </div>";
			}
		}
	
	}
	header('Location: AllTheme.php');
	exit();

?>