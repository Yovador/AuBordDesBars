<?php 

	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE COMMENT SET PseudoAuteur = :PseudoAuteur, EmailAuteur = :EmailAuteur, TitrCom = :TitrCom, LibCom = :LibCom, NumArt = :NumArt WHERE NumCom ="'.$_POST['NumCom'].'" ');

		$NumArt = GetOneEntry("NumArt", "ARTICLE", "LibTitrA",$_POST["NomArt"]);


		$data = array(
			':LibCom'=> $_POST["LibCom"],
			':PseudoAuteur'=> $_POST["PseudoAuteur"],
			':EmailAuteur'=> $_POST["EmailAuteur"],
			':TitrCom'=> $_POST["TitrCom"],
			':LibCom'=> $_POST["LibCom"],
			':NumArt'=> $NumArt,
		);

		$insert->execute($data);
		$DB->commit();

		echo "Updated !";


		
	} catch (PDOException $e) {
		echo $e;
		$DB->rollBack();
	}

	header('Location: Select.php');
	exit();

?>