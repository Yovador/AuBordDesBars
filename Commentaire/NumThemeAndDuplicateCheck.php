<?php 

	

	$CountCom = $DB->query('SELECT COUNT(*) FROM COMMENT');
	while ($CountNum = $CountCom->fetch()) {

		if ($CountNum['COUNT(*)'] < 999) {
			$NumCom = "0".$CountNum['COUNT(*)']+1;
		}
		else{
			$NumCom = $CountNum['COUNT(*)']+1;
		}

			$GetInfo = $DB->query('SELECT * FROM COMMENT');
			while ($DuplicateCheck = $GetInfo->fetch()) {
				if($DuplicateCheck['PseudoAuteur'] ==  $_POST['PseudoAuteur'] && $DuplicateCheck['EmailAuteur'] == $_POST['EmailAuteur'] && $DuplicateCheck['TitrCom'] == $_POST['TitrCom'] && $DuplicateCheck['TitrCom'] == $_POST['TitrCom'] && $DuplicateCheck['LibCom'] == $_POST['LibCom']){
					$CanSend = false;
				}
				else{
					$CanSend = true;
				}
			}

	}
 ?>