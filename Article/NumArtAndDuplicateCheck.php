<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 

	$result = $DB->query("SELECT MAX(NumArt) AS NumArt FROM ARTICLE;");

	if ($result) {

	    $tuple = $result->fetch();
	    $NumArt = $tuple["NumArt"];
	    $NumArt++;

	}

	$GetInfo = $DB->query('SELECT * FROM ARTICLE');
	while ($DuplicateCheck = $GetInfo->fetch()) {
		if($DuplicateCheck['LibTitrA'] ==  $_POST['LibTitrA'] && $DuplicateCheck['NumLang'] == $NumLang && $DuplicateCheck['NumAngl'] == $NumAngl && $DuplicateCheck['NumThem'] == $NumThem){
			$CanSend = false;
		}
		else{
			$CanSend = true;
		}
	}
 ?>

 <?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>

