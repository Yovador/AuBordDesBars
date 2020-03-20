<?php
	include "../General/connectionBD.php";

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM MOTCLEARTICLE WHERE NumMoCle = :NumMoCle  ");
		$data = array(
			':NumMoCle'=>$_POST["NumMoCle"],

		);
		$insert->execute($data);
		$DB->commit();


		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM MOTCLE WHERE NumMoCle = :NumMoCle  ");
		$data = array(
			':NumMoCle'=>$_POST["NumMoCle"],

		);
		
		$insert->execute($data);
		$DB->commit();



	}
	catch(PDOException $e){
		echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
		$DB->rollBack();
	}

	header('Location: AllMot.php');
	exit();
	

 ?>