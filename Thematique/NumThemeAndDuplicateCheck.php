<?php 

	

	$IsNumLang = $DB->query('SELECT COUNT(*) FROM THEMATIQUE WHERE NumLang = "'.$NumLang.'"');
	while ($CountNum = $IsNumLang->fetch()) {

		if ($CountNum['COUNT(*)'] > 0) { 
			//Create NumThem si il y a déja au moins un theme qui a la même langue que lui
			$GetThem = $DB->query('SELECT * FROM THEMATIQUE WHERE NumLang LIKE "'.$NumLang.'" LIMIT 1');
			while($Extract = $GetThem->fetch()){
				if ($CountNum['COUNT(*)'] < 9) {
					$NumThem = substr($Extract['NumThem'], 0, 5)."0".($CountNum['COUNT(*)']+1);
				}
				else{
					$NumThem = substr($Extract['NumThem'], 0, 5).($CountNum['COUNT(*)']+1);
				}
			}

			//Duplicate Check

			$GetInfo = $DB->query('SELECT * FROM THEMATIQUE');
			while ($DuplicateCheck = $GetInfo->fetch()) {
				if($DuplicateCheck['LibThem'] == $_POST['LibThem'] && $DuplicateCheck['NumLang'] == $NumLang){
					$CanSend = false;
				}
				else{
					$CanSend = true;
				}
			}
		}

		else{

			$CanSend = true;



		//Create NumThem si il n'y a pas de theme qui ont la meme langue que lui


			$CountLang = $DB->query('SELECT NumLang FROM THEMATIQUE');
			$ListOfLangue = array();
			$NumberOfLang =0;
			while ($GetLang = $CountLang->fetch()) {
				if (!in_array($GetLang['NumLang'], $ListOfLangue)) {
					array_push($ListOfLangue, $GetLang['NumLang']);
					$NumberOfLang ++;
				}
			}
			if ($CountNum['COUNT(*)'] < 9) {
				$NumThem = "THE0".($NumberOfLang+1)."01";
			}
			else{
				$NumThem = "THE".($NumberOfLang+1)."01";	
			}
		}




	}
 ?>