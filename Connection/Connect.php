<?php session_start(); ?>


<?php  
	
	include "FormConnect.php";


	if (isset($_POST["Connection"])) {

		if ($_POST["Login"] != "" && $_POST["Pass"] != "") {

			include '../General/connectionBD.php';
			$Get = $DB->query('SELECT * FROM USER WHERE Login ="'.$_POST["Login"].'" AND Pass ="'.$_POST["Pass"].'" ');
			while ($Info = $Get->fetch()) {
				$_SESSION['Login'] = $Info['Login'];
				$_SESSION['Pass'] = $Info['Pass'];
				$_SESSION['FirstName'] = $Info['FirstName'];
				$_SESSION['LastName'] = $Info['LastName'];
				$_SESSION['EMail'] = $Info['EMail'];
				$_SESSION['admin'] = $Info['admin'];
				$_SESSION['IsConnect'] = true;
			}

			header('Location: ../index.php');
			exit();

		}
		else{
			echo "Tout les champs ne sont pas complet !";
		}



	}
	



?>