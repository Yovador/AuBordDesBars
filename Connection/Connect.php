<?php session_start(); ?>


<?php  
	
	include "FormConnect.php";


	if (isset($_POST["Connection"])) {

		if ($_POST["Login"] != "" && $_POST["Pass"] != "") {
			include '../General/connectionBD.php';
			


				$Get = $DB->query('SELECT * FROM USER WHERE Login ="'.$_POST["Login"].'" ');
				while ($Info = $Get->fetch()) {

					if (password_verify($_POST["Pass"], $Info['Pass'])) {
						$_SESSION['Login'] = $Info['Login'];
						$_SESSION['FirstName'] = $Info['FirstName'];
						$_SESSION['LastName'] = $Info['LastName'];
						$_SESSION['EMail'] = $Info['EMail'];
						$_SESSION['admin'] = $Info['admin'];
						$_SESSION['IsConnect'] = true;
						$_SESSION['Likes'] = array();
						$_SESSION['MotCle'] = array();


						header('Location: ../index.php');
						exit();
					}
					else{
						echo "Mauvais mdp !";
					}

					
				}

		}
		else{
			echo "Tout les champs ne sont pas complet !";
		}



	}
	



?>