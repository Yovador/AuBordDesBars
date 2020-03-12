<?php 

	include "FormCreate.php";
	include "GetNumPays.php"; 

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['Lib1Lang'] != "" && $_POST['Lib2Lang'] != "" && $_POST['frPays'] != ""){
				include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
				
				try {
					
					$NumPays = GetNumPays($_POST["frPays"]);

					include "NumLangAndDuplicateCheck.php";

					if ($CanSend) {
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO LANGUE (NumLang, Lib1Lang, Lib2Lang, NumPays) VALUES(:NumLang, :Lib1Lang, :Lib2Lang, :NumPays);");

						$data = array(
							':NumLang'=>$NumLang,
							':Lib1Lang'=>$_POST["Lib1Lang"],
							':Lib2Lang'=>$_POST["Lib2Lang"],
							':NumPays'=>$NumPays,

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