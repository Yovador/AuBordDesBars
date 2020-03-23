<?php 

	$result = $DB->query("SELECT MAX(NumCom) AS NumCom FROM COMMENT;");

	if ($result) {

	    $tuple = $result->fetch();
	    $NumCom = $tuple["NumCom"];
	    $NumCom++;

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
 ?>