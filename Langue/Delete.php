<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php
	include "../General/connectionBD.php";

	try {
		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM LANGUE WHERE NumLang = :NumLang  ");
		$data = array(
			':NumLang'=>$_POST["NumLang"],

		);
		
		$insert->execute($data);
		$DB->commit();



	}
	catch(PDOException $e){
		echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
		$DB->rollBack();
	}

	header('Location: AllLangue.php');
	exit();
	

 ?>

 <?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>