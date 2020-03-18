<?php 

	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE ANGLE SET LibAngl = :LibAngl, NumLang = :NumLang WHERE NumAngl ="'.$_POST['NumAngl'].'" ');

		$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST["NomLang"]);


		$data = array(
			':LibAngl'=> $_POST["LibAngl"],
			':NumLang'=> $NumLang,
		);

		$insert->execute($data);
		$DB->commit();

		echo "Updated !";


		
	} catch (PDOException $e) {
		echo $e;
		$DB->rollBack();
	}

	header('Location: AllAngle.php');
	exit();

?>