<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 

	include "../General/GetOneEntry.php";
	include "../General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['PseudoAuteur'] != "" && $_POST['EmailAuteur'] != "" && $_POST['TitrCom'] != "" && $_POST['LibCom'] != "" && $_POST['LibTitrA'] != "" ){
				include "../General/connectionBD.php";
				try {
					
					$NumArt = GetOneEntry("NumArt", "ARTICLE", "LibTitrA",$_POST["LibTitrA"]);

					include "NumCommentAndDuplicateCheck.php";
					
					date_default_timezone_set('Europe/Paris');
					$DtCreC = date('Y-m-j H:i:s');
					

					if ($CanSend) {
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO COMMENT (NumCom, DtCreC, PseudoAuteur, EmailAuteur, TitrCom ,LibCom, NumArt) VALUES(:NumCom, :DtCreC, :PseudoAuteur, :EmailAuteur, :TitrCom, :LibCom, :NumArt);");

						$data = array(
							':NumCom'=> $NumCom,
							':DtCreC'=> $DtCreC,
							':PseudoAuteur'=> $_POST["PseudoAuteur"],
							':EmailAuteur'=> $_POST['EmailAuteur'],
							':TitrCom'=> $_POST['TitrCom'],
							':LibCom'=> $_POST['LibCom'],
							':NumArt'=> $NumArt,
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

	header('Location: ./AllComment.php');
	exit();

?>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>