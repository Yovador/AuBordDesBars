<?php 

	$result = $DB->query("SELECT MAX(NumCom) AS NumCom FROM COMMENT;");

	if ($result) {

	    $tuple = $result->fetch();
	    $NumCom = $tuple["NumCom"];
	    $NumCom++;

	}

	$GetInfo = $DB->query('SELECT * FROM COMMENT WHERE NumArt ="'.$NumArt.'" ');
	while ($DuplicateCheck = $GetInfo->fetch()) {
		if($DuplicateCheck['PseudoAuteur'] ==  $_SESSION['Login'] && $DuplicateCheck['EmailAuteur'] == $_SESSION['EMail'] && $DuplicateCheck['TitrCom'] == $_POST['TitrCom'] && $DuplicateCheck['TitrCom'] == $_POST['TitrCom'] && $DuplicateCheck['LibCom'] == $_POST['LibCom']){
			$CanSend = false;
		}
		else{
			$CanSend = true;
		}
	}
 ?>