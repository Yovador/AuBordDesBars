<?php
	include "../General/connectionBD.php";


			try {

				$DB->beginTransaction();


				$insert = $DB->prepare("INSERT INTO MOTCLEARTICLE(NumArt, NumMoCle) VALUES(:NumArt, :NumMoCle);");

				$Exist = $DB->query("SELECT COUNT(*) FROM MOTCLEARTICLE WHERE NumArt = '".$NumArt."' AND NumMoCle = '".$NumMoCle."'");

				while ($CountMot = $Exist->fetch()) {

					echo $CountMot['COUNT(*)'], "<br>";

					if ($CountMot['COUNT(*)']>0) {
						$CanSend = false;
					}
					else{
						$CanSend = true;
					}
				}

				if ($CanSend) {
					$data = array(
						':NumArt'=> $NumArt, 
						':NumMoCle'=> $NumMoCle,
					);

					$insert->execute($data);
					$DB->commit();
				}
				else{
					echo "Mot clé existe deja";
				}


			}
			catch (PDOException $e) {
				echo $e;
				$DB->rollBack();
			}

	
				

?>
