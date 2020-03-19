<?php
	include "../General/connectionBD.php";

	try {
		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM ANGLE WHERE NumAngl = :NumAngl  ");
		$data = array(
			':NumAngl'=>$_POST["NumAngl"],

		);
		
		$insert->execute($data);
		$DB->commit();



	}
	catch(PDOException $e){
		echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
		$DB->rollBack();
	}

	header('Location: AllAngle.php');
	exit();
	

 ?>