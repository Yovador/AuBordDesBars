<?php
	include "../General/connectionBD.php";

	try {
		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM USER WHERE Login = :Login  ");
		$data = array(
			':Login'=>$_POST["Login"],

		);
		
		$insert->execute($data);
		$DB->commit();



	}
	catch(PDOException $e){
		echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
		$DB->rollBack();
	}

	header('Location: ./AllUser.php');
	exit();
	

 ?>