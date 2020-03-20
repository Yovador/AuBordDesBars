<?php 

	include "FormCreate.php";
	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";
	include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['LibMoCle'] != "" && $_POST['Lib1Lang'] != ""){
				include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
				try {
					
					$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST["Lib1Lang"]);

					include "NumMotAndDuplicateCheck.php";

					if ($CanSend) {
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO MOTCLE (NumMoCle, LibMoCle, NumLang) VALUES(:NumMoCle, :LibMoCle, :NumLang);");

						$data = array(
							':NumMoCle'=>$NumMoCle,
							':LibMoCle'=>$_POST["LibMoCle"],
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

	header('Location: AllMot.php');
	exit();

?>