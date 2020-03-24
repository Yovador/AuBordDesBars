<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['Login'] != "" && $_POST['Pass'] != "" && $_POST['EMail'] != ""){
				include "../General/connectionBD.php";
				try {
							
						$DB->beginTransaction();

						$insert = $DB->prepare("INSERT INTO USER (Login, Pass, LastName, FirstName, EMail, admin) VALUES(:Login, :Pass, :LastName, :FirstName, :EMail, :admin);");

						$data = array(
							":Login" => $_POST['Login'], 
							":Pass" => $_POST['Pass'], 
							":LastName" => $_POST['LastName'], 
							":FirstName" => $_POST['FirstName'], 
							":EMail" => $_POST['EMail'],
							":admin" => 1,

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

	header('Location: ./AllUser.php');
	exit();

?>