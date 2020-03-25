<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php 

	

	$IsNum = $DB->query('SELECT COUNT(*) FROM THEMATIQUE WHERE NumLang = "'.$NumLang.'"');
	while ($CountNum = $IsNum->fetch()) {

		if ($CountNum['COUNT(*)'] > 0) { 
			//Create NumThem si il y a déja au moins un theme qui a la même langue que lui
			while($Extract = $GetThem->fetch()){

				$getmax = $DB->query("SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE WHERE NumLang = '".$NumLang."'");
				while($max = $getmax->fetch()){

					if ($CountNum['COUNT(*)'] < 9) {
						$NumThem = substr($max['NumThem'], 0, 5)."0".((int)substr($max['NumThem'],5, 7)+1);
					}

					else{
						$NumThem = substr($max['NumThem'], 0, 5).((int)substr($max['NumThem'],5, 7)+1);
					}

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


<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>