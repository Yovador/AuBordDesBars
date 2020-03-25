<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php 

if ($isAdmin) {
	include "../General/connectionBD.php";
	include "../General/GetOneEntry.php"; 

		try {


			$DB->beginTransaction();
			$insert = $DB->prepare('UPDATE USER SET LastName = :LastName, FirstName = :FirstName, EMail = :EMail, admin = :admin WHERE Login ="'.$_POST['Login'].'" ');


			if ( isset($_POST['admin'])) {
				$admin = 1;
			}
			else{
				$admin = 0;
			}

			$data = array( 
				":LastName" => $_POST['LastName'], 
				":FirstName" => $_POST['FirstName'], 
				":EMail" => $_POST['EMail'],
				":admin" => $admin,
			);

			$insert->execute($data);
			$DB->commit();

			echo "Updated !";


			
		} catch (PDOException $e) {
			echo $e;
			$DB->rollBack();
		}

		header('Location: ./AllUser.php');
		exit();
		}
	}

else{
	header('Location: ../index.php');
	exit();
}


?>