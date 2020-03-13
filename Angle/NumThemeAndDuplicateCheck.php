<?php 

	

	$IsNumLang = $DB->query('SELECT COUNT(*) FROM ANGLE WHERE NumLang = "'.$NumLang.'"');
	while ($CountNum = $IsNumLang->fetch()) {

		if ($CountNum['COUNT(*)'] > 0) { 
			//Create NumAngle si il y a déja au moins un angle qui a la même langue que lui
			$GetAngl = $DB->query('SELECT * FROM ANGLE WHERE NumLang LIKE "'.$NumLang.'" LIMIT 1');
			while($Extract = $GetAngl->fetch()){
				if ($CountNum['COUNT(*)'] < 9) {
					$NumAngl = substr($Extract['NumAngl'], 0, 6)."0".($CountNum['COUNT(*)']+1);
				}
				else{
					$NumAngl = substr($Extract['NumAngl'], 0, 6).($CountNum['COUNT(*)']+1);
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
				$NumAngl = "ANG".($NumberOfLang+1)."01";	
			}
		}




	}
 ?>