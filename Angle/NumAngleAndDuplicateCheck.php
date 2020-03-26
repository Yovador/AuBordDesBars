<?php 

	

	$IsNumLang = $DB->query('SELECT COUNT(*) FROM ANGLE WHERE NumLang = "'.$NumLang.'"');
	while ($CountNum = $IsNumLang->fetch()) {

		if ($CountNum['COUNT(*)'] > 0) { 
			//Create NumAngle si il y a déja au moins un angle qui a la même langue que lui
			$getmax = $DB->query("SELECT MAX(NumAngl) AS NumAngl FROM ANGLE WHERE NumLang = '".$NumLang."'");
			while($max = $getmax->fetch()){

				if ($CountNum['COUNT(*)'] < 9) {
					$NumAngl = substr($max['NumAngl'], 0, 5)."0".((int)substr($max['NumAngl'],5, 7)+1);
				}

				else{
					$NumAngl = substr($max['NumAngl'], 0, 5).((int)substr($max['NumAngl'],5, 7)+1);
				}

			}

			//Duplicate Check

			$GetInfo = $DB->query('SELECT * FROM ANGLE');
			while ($DuplicateCheck = $GetInfo->fetch()) {
				if($DuplicateCheck['LibAngl'] == $_POST['LibAngl'] && $DuplicateCheck['NumLang'] == $NumLang){
					$CanSend = false;
				}
				else{
					$CanSend = true;
				}
			}
		}

		else{

			$CanSend = true;



		//Create NumAngle si il n'y a pas de Angle qui ont la meme langue que lui


			$CountLang = $DB->query('SELECT NumLang FROM ANGLE');
			$ListOfLangue = array();
			$NumberOfLang =0;
			while ($GetLang = $CountLang->fetch()) {
				if (!in_array($GetLang['NumLang'], $ListOfLangue)) {
					array_push($ListOfLangue, $GetLang['NumLang']);
					$NumberOfLang ++;
				}
			}
			if ($CountNum['COUNT(*)'] < 9) {
				$NumAngl = "ANGL0".($NumberOfLang+1)."01";
			}
			else{
				$NumAngl = "ANGL".($NumberOfLang+1)."01";	
			}
		}




	}
 ?>