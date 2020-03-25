<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<?php 

	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE MOTCLE SET LibMoCle = :LibMoCle, NumLang = :NumLang WHERE NumMoCle ="'.$_POST['NumMoCle'].'" ');

		$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST["NomLang"]);


		$data = array(
			':LibMoCle'=> $_POST["LibMoCle"],
			':NumLang'=> $NumLang,
		);

		$insert->execute($data);
		$DB->commit();

		echo "Updated !";


		
	} catch (PDOException $e) {
		echo $e;
		$DB->rollBack();
	}

	header('Location: AllMot.php');
	exit();

?>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>