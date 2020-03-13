<?php 
	if (!function_exists("GetOneEntry")) {
		function GetOneEntry($keySelect, $table, $key,  $value){
			include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
			$numSelect = $DB->query('SELECT '.$keySelect.' FROM '.$table.' WHERE '.$key.' = "'.$value.'"');
			while ($GetPays = $numSelect->fetch()) {
				return $GetPays[$keySelect];
			}
		}
	}
 ?>