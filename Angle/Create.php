<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 

	include "FormCreate.php";
	include "../General/GetOneEntry.php";
	include "../General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['LibAngl'] != "" && $_POST['Lib1Lang'] != ""){
				include "../General/connectionBD.php";
				try {
					
					$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST["Lib1Lang"]);

					include "NumAngleAndDuplicateCheck.php";

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
	}
	header('Location: AllAngle.php');
	exit();

?>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>