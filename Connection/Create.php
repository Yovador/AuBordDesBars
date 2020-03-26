<?php 


	include "FormInscription.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Inscription') {
			if ($_POST['Login'] != "" && $_POST['Pass'] != "" && $_POST['EMail'] != ""){
				include "../General/connectionBD.php";

				$IsThereLogin = $DB->query('SELECT COUNT(*) FROM USER WHERE Login = "'.$_POST['Login'].'" ');
				while ($Create = $IsThereLogin->fetch()) {
					if ($Create['COUNT(*)'] == 0) {
						try {
							echo "Inscrit !";
							$DB->beginTransaction();

							$insert = $DB->prepare("INSERT INTO USER (Login, Pass, LastName, FirstName, EMail, admin) VALUES(:Login, :Pass, :LastName, :FirstName, :EMail, :admin);");

						
							$data = array(
								":Login" => $_POST['Login'], 
								":Pass" => password_hash($_POST['Pass'], PASSWORD_DEFAULT), 
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
					else{
						echo "Ce login est déja utilisé !";
					}

				}
			}
			else {
				echo "<div style='color : red;'> Tout les champs ne sont pas rempli ! </div>";
			}


				
		}

	}

	header('Location: ../index.php');
	exit();

?>
