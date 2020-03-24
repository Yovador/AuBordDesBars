<?php 

	include "../General/connectionBD.php";
	include "../General/GetOneEntry.php"; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE USER SET LastName = :LastName, FirstName = :FirstName, EMail = :EMail WHERE Login ="'.$_POST['Login'].'" ');

		$data = array( 
			":LastName" => $_POST['LastName'], 
			":FirstName" => $_POST['FirstName'], 
			":EMail" => $_POST['EMail'],
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

?>