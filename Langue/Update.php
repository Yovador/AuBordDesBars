<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php 

	include "../General/connectionBD.php";
	include "../General/GetOneEntry.php"; 

	try {


		$DB->beginTransaction();

		$insert = $DB->prepare('UPDATE LANGUE SET Lib1Lang = :Lib1Lang, Lib2Lang = :Lib2Lang, NumPays = :NumPays WHERE NumLang ="'.$_POST['NumLang'].'" ');

		$NumPays = GetOneEntry("numPays", "PAYS", "frPays",$_POST["frPays"]);


		$data = array(
			':Lib1Lang'=>$_POST["Lib1Lang"],
			':Lib2Lang'=>$_POST["Lib2Lang"],
			':NumPays'=>$NumPays,

		);

		$insert->execute($data);
		$DB->commit();

		echo "Updated !";


		
	} catch (PDOException $e) {
		echo $e;
		$DB->rollBack();
	}

	header('Location: AllLangue.php');
	exit();

?>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>