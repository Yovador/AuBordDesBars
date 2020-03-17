<?php 

	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";
	include $_SERVER['DOCUMENT_ROOT']."/General/GetOneEntry.php"; 

	$Set = "LibTitrA = :LibTitrA, LibChapoA = :LibChapoA, LibAccrochA = :LibAccrochA, Parag1A = :Parag1A, LibSsTitr1 = :LibSsTitr1, Parag2A = :Parag2A, LibSsTitr2 = :LibSsTitr2, Parag3A = :Parag3A, LibConclA = :LibConclA, UrlPhotA = :UrlPhotA, Likes = :Likes, NumAngl = :NumAngl, NumThem = :NumThem, NumLang = :NumLang" ; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE ARTICLE SET '.$Set.' WHERE NumArt ="'.$_POST['NumArt'].'" ');

		$NumAngl = GetOneEntry("NumAngl", "ANGLE", "LibAngl",$_POST['NomAngl']);
		$NumThem = GetOneEntry("NumThem", "THEMATIQUE", "LibThem",$_POST['NomThem']);
		$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_POST['NomLang']);

		$data = array(

				':LibTitrA'=> $_POST["LibTitrA"],
				':LibChapoA'=> $_POST["LibChapoA"],
				':LibAccrochA'=> $_POST["LibAccrochA"],
				':Parag1A'=> $_POST["Parag1A"],
				':LibSsTitr1'=> $_POST["LibSsTitr1"],
				':Parag2A'=> $_POST["Parag2A"],
				':LibSsTitr2'=> $_POST["LibSsTitr2"],
				':Parag3A'=> $_POST["Parag3A"],
				':LibConclA'=> $_POST["LibConclA"],
				':UrlPhotA'=> $_POST["UrlPhotA"],
				':Likes'=> $_POST["Likes"],
				':NumAngl'=> $NumAngl,
				':NumThem'=> $NumThem,
				':NumLang'=> $NumLang,

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