<?php 

	include "FormCreate.php";
	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";
	include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['LibAngl'] != "" && $_POST['Lib1Lang'] != ""){
				include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
				try {
					
					$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST["Lib1Lang"]);

					include "NumThemeAndDuplicateCheck.php";

					if ($CanSend) {
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO ANGLE (NumAngl, LibAngl, NumLang) VALUES(:NumAngl, :LibAngl, :NumLang);");

						$data = array(
							':NumAngl'=>$NumAngl,
							':LibAngl'=>$_POST["LibAngl"],
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
		include "Select.php";
	}

?>