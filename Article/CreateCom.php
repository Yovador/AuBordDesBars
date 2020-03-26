<?php 

	include "../General/GetOneEntry.php";
	include "../General/SelectList.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_SESSION["Login"] != "" && $_SESSION['EMail'] != "" && $_POST['TitrCom'] != "" && $_POST['LibCom'] != ""){
				include "../General/connectionBD.php";
				try {
					
					include "NumCommentAndDuplicateCheck.php";
					
					date_default_timezone_set('Europe/Paris');
					$DtCreC = date('Y-m-j H:i:s');
					

					if ($CanSend) {
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO COMMENT (NumCom, DtCreC, PseudoAuteur, EmailAuteur, TitrCom ,LibCom, NumArt) VALUES(:NumCom, :DtCreC, :PseudoAuteur, :EmailAuteur, :TitrCom, :LibCom, :NumArt);");

						$data = array(
							':NumCom'=> $NumCom,
							':DtCreC'=> $DtCreC,
							':PseudoAuteur'=> $_SESSION["Login"],
							':EmailAuteur'=> $_SESSION['EMail'],
							':TitrCom'=> $_POST['TitrCom'],
							':LibCom'=> $_POST['LibCom'],
							':NumArt'=> $NumArt,
						);

						$insert->execute($data);
						$DB->commit();
					}
					else{
					}
				
				} 

				catch (PDOException $e) {
					echo $e;
					$DB->rollBack();
				}
			}
			else {
			}
		}

	}

?>