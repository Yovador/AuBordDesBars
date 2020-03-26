<?php 

	$GetMax = $DB->query("SELECT MAX(NumLang) AS NumLang FROM LANGUE;");

	

	if ($GetMax) {

	    $Max = $GetMax->fetch();
	    $NumLang = $NumPays.((int)substr($Max["NumLang"],strlen($Max["NumLang"])-2,strlen($Max["NumLang"]))+1);

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


 ?>