<?php 

	

	$IsNumLang = $DB->query('SELECT COUNT(*) FROM MOTCLE WHERE NumLang = "'.$NumLang.'"');
	while ($CountNum = $IsNumLang->fetch()) {

		if ($CountNum['COUNT(*)'] > 0) { 
			//Create NumMoCle si il y a déja au moins un motclé qui a la même langue que lui
			$getmax = $DB->query("SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE WHERE NumLang = '".$NumLang."'");
			while($max = $getmax->fetch()){

				if ($CountNum['COUNT(*)'] < 9) {
					$NumMoCle = substr($max['NumMoCle'], 0, 4)."0".((int)substr($max['NumMoCle'],4, 6)+1);
				}

				else{
					$NumMoCle = substr($max['NumMoCle'], 0, 4).((int)substr($max['NumMoCle'],4, 6)+1);
				}

			}

			//Duplicate Check

			$GetInfo = $DB->query('SELECT * FROM MOTCLE');
			while ($DuplicateCheck = $GetInfo->fetch()) {
				if($DuplicateCheck['LibMoCle'] == $_POST['LibMoCle'] && $DuplicateCheck['NumLang'] == $NumLang){
					$CanSend = false;
				}
				else{
					$CanSend = true;
				}
			}
		}

		else{

			$CanSend = true;



		//Create NumMoCle si il n'y a pas de MoCle qui ont la meme langue que lui


			$CountLang = $DB->query('SELECT NumLang FROM MOTCLE');
			$ListOfLangue = array();
			$NumberOfLang =0;
			while ($GetLang = $CountLang->fetch()) {
				if (!in_array($GetLang['NumLang'], $ListOfLangue)) {
					array_push($ListOfLangue, $GetLang['NumLang']);
					$NumberOfLang ++;
				}
			}
			if ($CountNum['COUNT(*)'] < 9) {
				$NumMoCle = "MTCL0".($NumberOfLang+1)."01";
			}
			else{
				$NumMoCle = "MTCL".($NumberOfLang+1)."01";	
			}
		}




	}

	if(!isset($CanSend)){
		$CanSend = true;
	}
 ?>