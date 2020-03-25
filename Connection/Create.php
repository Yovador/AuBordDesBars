<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		echo $_POST['Login'], $_POST['Pass'], $_POST['EMail'];
		
		if (!empty($Submit) && $Submit == 'Créé') {
			if ($_POST['Login'] != "" && $_POST['Pass'] != "" && $_POST['EMail'] != ""){
				echo "Hein";
				include "../General/connectionBD.php";
				try {
						echo "What";
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO USER (Login, Pass, LastName, FirstName, EMail, admin) VALUES(:Login, :Pass, :LastName, :FirstName, :EMail, :admin);");

					
						$data = array(
							":Login" => $_POST['Login'], 
							":Pass" => $_POST['Pass'], 
							":LastName" => $_POST['LastName'], 
							":FirstName" => $_POST['FirstName'], 
							":EMail" => $_POST['EMail'],
							":admin" => 0,
						);

						$insert->execute($data);
						$DB->commit();			
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

	//header('Location: ../index.php');
	//exit();

?>
