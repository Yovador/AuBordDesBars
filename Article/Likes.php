<?php 
	
	include "../General/connectionBD.php";

	$GetLikes = $DB->query('SELECT * FROM ARTICLE WHERE NumArt = "'.$_GET["NumArt"].'" ');

	while ($Likes = $GetLikes->fetch()) {
		try {
			$DB->beginTransaction();
			$insert = $DB->prepare("UPDATE ARTICLE SET Likes = :Likes WHERE NumArt = '".$_GET["NumArt"]."' ");
			$data = array(
			':Likes'=> $Likes['Likes'] + 1,

			);
			$insert->execute($data);
			$DB->commit();
		} 	
		catch(PDOException $e){
			echo "<p> You can't Delete that ! </p>", "<p>", $e , "</p>";
			$DB->rollBack();
		}
	}
 ?>