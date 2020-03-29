<?php 

	$GetMax = $DB->query("SELECT MAX(NumLang) AS NumLang FROM LANGUE WHERE NumPays ='".$NumPays."' ;");

	if ($GetMax) {
		$Max = $GetMax->fetch();
		$NumPrev = (int)substr($Max["NumLang"],strlen($Max["NumLang"])-2,strlen($Max["NumLang"]));

		if ($NumPrev==0) {
			$Number = 1;
		}
		else{
			$Number = ($NumPrev + 1);
		}


		if ($Number <= 9) {
	    	$NumLang = $NumPays."0".$Number;
		}
		else{
	    	$NumLang = $NumPays.$Number;
		}

	}
	else{
		$NumLang = $NumPays."01";
	}



	$InfoLang = $DB->query('SELECT * FROM LANGUE WHERE NumPays = "'.$NumPays.'%"');
		while ($DuplicateCheck = $InfoLang->fetch()) {
			if ( $DuplicateCheck['Lib1Lang'] == $_POST['Lib1Lang'] && $DuplicateCheck['Lib2Lang'] == $_POST['Lib2Lang']) {
				$CanSend = false;
			}
			else{
				
				$CanSend = true;
			}

		}
		if (!isset($CanSend)) {
			$CanSend = true;
		}


	if(!isset($CanSend)){
		$CanSend = true;
	}


 ?>