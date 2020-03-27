<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php
	include "../General/connectionBD.php";

	try {

		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM COMMENT WHERE NumArt = :NumArt  ");
		$data = array(
			':NumArt'=>$_POST["NumArt"],

		);
		
		$insert->execute($data);
		$DB->commit();



		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM MOTCLEARTICLE WHERE NumArt = :NumArt  ");
		$data = array(
			':NumArt'=>$_POST["NumArt"],

		);
		
		$insert->execute($data);
		$DB->commit();

		$CheckPhoto = $DB->query('SELECT * FROM ARTICLE WHERE  NumArt = "'.$_POST["NumArt"].'"');
		while ($Photo = $CheckPhoto->fetch()) {
			$UrlPhotA = substr($Photo['UrlPhotA'], 3);
			unlink($UrlPhotA);
		}


		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM ARTICLE WHERE NumArt = :NumArt  ");
		$data = array(
			':NumArt'=>$_POST["NumArt"],

		);
		
		$insert->execute($data);
		$DB->commit();



	}
	catch(PDOException $e){
		echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
		$DB->rollBack();
	}

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