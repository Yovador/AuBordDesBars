
<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php
	include "../General/connectionBD.php";

	try {
		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM THEMATIQUE WHERE NumThem = :NumThem  ");
		$data = array(
			':NumThem'=>$_POST["NumThem"],

		);
		
		$insert->execute($data);
		$DB->commit();



	}
	catch(PDOException $e){
		echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
		$DB->rollBack();
	}

	header('Location: AllTheme.php');
	exit();
	

 ?>



<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>