<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 

	include "../General/connectionBD.php";
	include "../General/GetOneEntry.php"; 

	$Set = "LibTitrA = :LibTitrA, LibChapoA = :LibChapoA, LibAccrochA = :LibAccrochA, Parag1A = :Parag1A, LibSsTitr1 = :LibSsTitr1, Parag2A = :Parag2A, LibSsTitr2 = :LibSsTitr2, Parag3A = :Parag3A, LibConclA = :LibConclA, UrlPhotA = :UrlPhotA, NumAngl = :NumAngl, NumThem = :NumThem, NumLang = :NumLang" ; 

	try {


		$DB->beginTransaction();
		$insert = $DB->prepare('UPDATE ARTICLE SET '.$Set.' WHERE NumArt ="'.$_SESSION['NumArt'].'" ');

		$NumAngl = GetOneEntry("NumAngl", "ANGLE", "LibAngl",$_SESSION['NomAngl']);
		$NumThem = GetOneEntry("NumThem", "THEMATIQUE", "LibThem",$_SESSION['NomThem']);
		$NumLang = GetOneEntry("NumLang", "LANGUE", "Lib1Lang",$_SESSION['NomLang']);

		echo $_SESSION['UrlPhotA'];

		if ($_SESSION['UrlPhotA'] != "") {
			$UrlPhotA = $_SESSION['UrlPhotA'];
		}
		else{
			$GetUrl = $DB->query('SELECT UrlPhotA FROM ARTICLE WHERE NumArt ="'.$_SESSION['NumArt'].'"');
			while($Url = $GetUrl->fetch()){
				$UrlPhotA = $Url['UrlPhotA'];
			}			
		}
		
		
		$data = array(

					':LibTitrA'=> $_SESSION["LibTitrA"],
					':LibChapoA'=> $_SESSION["LibChapoA"],
					':LibAccrochA'=> $_SESSION["LibAccrochA"],
					':Parag1A'=> $_SESSION["Parag1A"],
					':LibSsTitr1'=> $_SESSION["LibSsTitr1"],
					':Parag2A'=> $_SESSION["Parag2A"],
					':LibSsTitr2'=> $_SESSION["LibSsTitr2"],
					':Parag3A'=> $_SESSION["Parag3A"],
					':LibConclA'=> $_SESSION["LibConclA"],
					':UrlPhotA'=> $UrlPhotA,
					':NumAngl'=> $NumAngl,
					':NumThem'=> $NumThem,
					':NumLang'=> $NumLang,

		);

		$insert->execute($data);
		$DB->commit();

		
	} catch (PDOException $e) {
		echo $e;
		$DB->rollBack();
	}



	$DB->beginTransaction();
	$insert = $DB->prepare("DELETE FROM MOTCLEARTICLE WHERE NumArt = :NumArt  ");
	$data = array(
		':NumArt'=>$_SESSION["NumArt"],

	);
	
	$insert->execute($data);
	$DB->commit();

	$NumArt = $_SESSION["NumArt"];
	foreach ($_SESSION['MotCle'] as $key => $value) {
		$NumMoCle = GetOneEntry("NumMoCle", "MOTCLE", "LibMoCle", $value);
		include "LinkMotCle.php";
	}

	include "../General/UnsetCreate.php";

	header('Location: ./AllArticle.php');
	exit();

?>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>