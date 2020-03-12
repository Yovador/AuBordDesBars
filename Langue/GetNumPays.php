<?php 
	
	function GetNumPays($frPays){
		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
		$numSelect = $DB->query('SELECT numPays FROM PAYS WHERE frPays = "'.$frPays.'"');
		while ($GetPays = $numSelect->fetch()) {
			return $GetPays['numPays'];
		}
	}

	function GetfrPays($numPays){
		include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
		$frSelect = $DB->query('SELECT frPays FROM PAYS WHERE numPays = "'.$numPays.'"');
		while ($GetPays = $frSelect->fetch()) {
			return $GetPays['frPays'];
		}
	}
 ?>