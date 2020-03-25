<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		
		if (!empty($Submit) && $Submit == 'Valider') {
			if ($_POST['Login'] != "" && $_POST['Pass'] != "" && $_POST['EMail'] != ""){
				include "../General/connectionBD.php";
				$IsThereLogin = $DB->query('SELECT COUNT(*) FROM USER WHERE Login = "'.$_POST['Login'].'" ');
				while ($Create = $IsThereLogin->fetch()) {
					if ($Create['COUNT(*)'] == 0) {
						try {
									
							$DB->beginTransaction();

							$insert = $DB->prepare("INSERT INTO USER (Login, Pass, LastName, FirstName, EMail, admin) VALUES(:Login, :Pass, :LastName, :FirstName, :EMail, :admin);");

							if ( isset($_POST['admin'])) {
								$admin = 1;
							}
							else{
								$admin = 0;
							}
						
							$data = array(
								":Login" => $_POST['Login'], 
								":Pass" => password_hash($_POST['Pass'], PASSWORD_DEFAULT),  
								":LastName" => $_POST['LastName'], 
								":FirstName" => $_POST['FirstName'], 
								":EMail" => $_POST['EMail'],
								":admin" => $admin,
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
						echo "Ce Pseudo est déja utilisé !";
					}
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

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>