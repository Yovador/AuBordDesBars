<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 

	$NumLang = strtoupper(substr($_POST['Lib1Lang'], 0, 4));

	$IsNumLang = $DB->query('SELECT COUNT(*) FROM LANGUE WHERE NumLang LIKE "'.$NumLang.'%"');
	$InfoLang = $DB->query('SELECT * FROM LANGUE WHERE NumLang LIKE "'.$NumLang.'%"');
	

	while ($CountNum = $IsNumLang->fetch()) {

		if ($CountNum['COUNT(*)'] > 0) {

			while ($DuplicateCheck = $InfoLang->fetch()) {
				if ( $DuplicateCheck['Lib1Lang'] == $_POST['Lib1Lang'] && $DuplicateCheck['Lib2Lang'] == $_POST['Lib2Lang'] && $DuplicateCheck['NumPays'] == $NumPays) {
					$CanSend = false;
				}
				else{
					
					$CanSend = true;
				}

			}
		}
		else{
			$CanSend = true;
		}
		

		if ($CountNum['COUNT(*)'] < 9) {
			$NumLang = $NumLang . "0" . ($CountNum['COUNT(*)']+1);
		}
		else{
			$NumLang = $NumLang . ($CountNum['COUNT(*)']+1);
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