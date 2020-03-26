<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php 

	include "../General/GetOneEntry.php";
	include "../General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['LibMoCle'] != "" && $_POST['Lib1Lang'] != ""){
				include "../General/connectionBD.php";
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

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>