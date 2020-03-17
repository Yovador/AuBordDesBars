<?php
	include $_SERVER['DOCUMENT_ROOT']."./General/connectionBD.php";

	try {
		$DB->beginTransaction();
		$insert = $DB->prepare("DELETE FROM MOTCLEARTICLE WHERE NumArt = :NumArt AND NumMoCle = :NumMoCle");
		$data = array(
			':NumMoCle'=>$_POST["NumMoCle"],
			':NumArt'=>$_POST["NumArt"],
		);
		
		$insert->execute($data);
		$DB->commit();



	}
	catch(PDOException $e){
		echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
		$DB->rollBack();
	}
 ?>

 	Suppression effectué !

 	<form action="MotcleLink.php" method="post"><input  type="submit" name="id" value="Retour" > <input  type="hidden" name="<?php echo "NumArt" ?>" value="<?php echo $_POST['NumArt'] ?>">  </form>


	