<?php 
	include "connectionBD.php";
	$GetPays = $DB->query('SELECT * FROM PAYS ');

	while ($ListPays = $GetPays->fetch()) {
		if ($UpdateMode) {
			if ($Selected == $ListPays['numPays']) {
				echo "<option value ='",$ListPays['frPays'],"' selected>", $ListPays['frPays'], "</option>";
			}
			else{
				echo "<option value ='",$ListPays['frPays'],"'>", $ListPays['frPays'], "</option>";
			}
		}
		else{
			echo "<option value ='",$ListPays['frPays'],"'>", $ListPays['frPays'], "</option>";
		}
		
	}


 ?>