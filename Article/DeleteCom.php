<?php

		include "../General/connectionBD.php";


		try {
			$DB->beginTransaction();
			$insert = $DB->prepare("DELETE FROM COMMENT WHERE NumCom = :NumCom  ");
			$data = array(
				':NumCom'=>$_GET["Target"],

			);
			
			$insert->execute($data);
			$DB->commit();



		}
		catch(PDOException $e){
			echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
			$DB->rollBack();
		}	

 ?>