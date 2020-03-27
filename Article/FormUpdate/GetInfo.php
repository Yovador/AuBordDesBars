<?php include "../../General/connectionBD.php" ?>
<?php include "../../General/GetOneEntry.php" ?>


<?php session_start(); ?>

<?php 
	
	if (!isset($_SESSION['MotCle'])) {
		$_SESSION['MotCle'] = array();
	}

	$GetInfo = $DB->query("SELECT * FROM ARTICLE WHERE NumArt = '".$_POST['NumArt']."' ");

	while ($Info = $GetInfo->fetch()) {

		$_SESSION['NumArt'] = $Info['NumArt'];
		$_SESSION['LibTitrA'] = $Info['LibTitrA'];
		$_SESSION['LibChapoA'] = $Info['LibChapoA'];
		$_SESSION['LibAccrochA'] = $Info['LibAccrochA'];
		$_SESSION['Parag1A'] = $Info['Parag1A'];
		$_SESSION['LibSsTitr1'] = $Info['LibSsTitr1'];
		$_SESSION['Parag2A'] = $Info['Parag2A'];
		$_SESSION['LibSsTitr2'] = $Info['LibSsTitr2'];
		$_SESSION['Parag3A'] = $Info['Parag3A'];
		$_SESSION['LibConclA'] = $Info['LibConclA'];
		$_SESSION['UrlPhotA'] = $Info['UrlPhotA'];
		$_SESSION['NomAngl'] = GetOneEntry("LibAngl", "ANGLE", "NumAngl", $Info['NumAngl']);
		$_SESSION['NomLang'] = GetOneEntry("Lib1Lang", "LANGUE", "NumLang", $Info['NumLang']);
		$_SESSION['NomThem'] = GetOneEntry("LibThem", "THEMATIQUE", "NumThem", $Info['NumThem']);

		$GetListMo = $DB->query("SELECT * FROM MOTCLEARTICLE WHERE NumArt = '".$Info['NumArt']."' ");
		while ($ListMo = $GetListMo->fetch()) {
			$MotCle = GetOneEntry("LibMoCle", "MOTCLE", "NumMoCle", $ListMo['NumMoCle']);
			echo $MotCle;
			array_push($_SESSION['MotCle'], $MotCle);
		}

	}

	header('Location: ./FormUpdate.php');
	exit();


?>