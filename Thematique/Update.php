<?php 

	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE THEMATIQUE SET LibThem = :LibThem, NumLang = :NumLang WHERE NumThem ="'.$_POST['NumThem'].'" ');

		$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST["NomLang"]);


		$data = array(
			':LibThem'=>$_POST["LibThem"],
			':NumLang'=> $NumLang,
		);

		$insert->execute($data);
		$DB->commit();

		echo "Updated !";


		
	} catch (PDOException $e) {
		echo $e;
		$DB->rollBack();
	}

	header('Location: AllTheme.php');
	exit();

?>