<?php
	include "../General/connectionBD.php";

	$MoCleList = $_POST['MoCleList'].";";
	$Mot = "";
	$ArrayMotCle[] = array();

	for ($i=0; $i < strlen($MoCleList); $i++) {
		$CharN = $MoCleList[$i];
		if ($CharN == ";") {
			array_push($ArrayMotCle, $Mot);
			$Mot = "";
		}	
		else{
			$Mot = $Mot . $CharN;
		}
	}

	foreach ($ArrayMotCle as $key => $value) {
		if ($key != 0) {
			
			$ifExist = $DB->query('SELECT COUNT(*) FROM MOTCLE WHERE LibMoCle ="'.$value.'" ');
			while ($Count = $ifExist->fetch()) {
				if ($Count['COUNT(*)'] > 0) {
					
				}
				else{
					try {
					
					$NumLang = "FRAN01";

					// Generation de la clé

					$IsNum = $DB->query('SELECT COUNT(*) FROM MOTCLE WHERE NumLang = "'.$NumLang.'"');

						while ($CountNum = $IsNum->fetch()) {

							if ($CountNum['COUNT(*)'] > 0) { 

								$Get = $DB->query('SELECT * FROM MOTCLE WHERE NumLang LIKE "'.$NumLang.'" LIMIT 1');
								while($Extract = $Get->fetch()){

									$getmax = $DB->query("SELECT MAX(NumThem) AS NumMoCle FROM MOTCLE");
									while($max = $getmax->fetch()){

										if ($CountNum['COUNT(*)'] < 9) {
											$NumThem = substr($Extract['NumMoCle'], 0, 5)."0".((int)substr($max['NumMoCle'],5, 7)+1);
										}

										else{
											$NumThem = substr($Extract['NumMoCle'], 0, 5).((int)substr($max['NumMoCle'],5, 7)+1);
										}

									}
								}
							}
							else{

								$CountLang = $DB->query('SELECT NumLang FROM THEMATIQUE');
								$ListOfLangue = array();
								$NumberOfLang = 0;
								while ($GetLang = $CountLang->fetch()) {
									if (!in_array($GetLang['NumLang'], $ListOfLangue)) {
										array_push($ListOfLangue, $GetLang['NumLang']);
										$NumberOfLang ++;
									}
								}
								if ($CountNum['COUNT(*)'] < 9) {
									$NumThem = "MTCL0".($NumberOfLang+1)."01";
								}
								else{
									$NumThem = "MTCL".($NumberOfLang+1)."01";	
								}

							}

						}

						// Création du mot clé


						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO MOTCLE (NumMoCle, LibMoCle, NumLang) VALUES(:NumMoCle, :LibMoCle, :NumLang);");

						$data = array(
							':NumMoCle'=>$NumMoCle,
							':LibMoCle'=> $value,
							':NumLang'=>$NumLang,

						);
						$insert->execute($data);
						$DB->commit();

				
					} 
					catch (PDOException $e) {
						echo $e;
						$DB->rollBack();	
					}



					try {
						
					} catch (PDOException $e) {
						echo $e;
						$DB->rollBack();
					}



				}
			}
		}	
	}

?>
