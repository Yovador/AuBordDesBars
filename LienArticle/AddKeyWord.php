<?php 

	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php";
	include $_SERVER['DOCUMENT_ROOT']."./General/SelectList.php";
	$CanSend = false;

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';
		
		if (!empty($Submit) && $Submit == 'Valider') {
				include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
				if ($_POST['NomMoCle'] != "" && $_POST['NumArt'] != "") {

					try {
						
						$DB->beginTransaction();

					
						$NumMoCle = GetOneEntry("NumMoCle","MOTCLE", "LibMoCle", $_POST['NomMoCle']);
						$insert = $DB->prepare("INSERT INTO MOTCLEARTICLE(NumArt, NumMoCle) VALUES(:NumArt, :NumMoCle);");

						$Exist = $DB->query("SELECT COUNT(*) FROM MOTCLEARTICLE WHERE NumArt = '".$_POST['NumArt']."' AND NumMoCle = '$NumMoCle'");

						while ($CountMot = $Exist->fetch()) {
							if ($CountMot['COUNT(*)']>0) {
								$CanSend = false;
							}
							else{
								$CanSend = true;
							}
						}




						if ($CanSend) {
							$data = array(
								':NumArt'=>$_POST['NumArt'] , 
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
					

				}

			else {
				echo "<div style='color : red;'> Tout les champs ne sont pas rempli ! </div>";
			}
		}
	}

?>

 	Création effectué !

 	<form action="MotcleLink.php" method="post"><input  type="submit" name="id" value="Retour" > <input  type="hidden" name="<?php echo "NumArt" ?>" value="<?php echo $_POST['NumArt'] ?>">  </form>