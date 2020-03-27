<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<?php include "../General/SelectList.php";
$primKey = "NumCom";?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier un Commentaire - Au Bord Des Bars</title>
</head>
<body>
	<form action="Update.php" method="post">
	<?php 

		include "../General/connectionBD.php";

		try {
			$request = $DB->query('SELECT * FROM COMMENT WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
			while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
			?>		
				<div> 
					Pseudo de l'auteur : 
					<input maxlength="20" type="text" name="PseudoAuteur" value="<?php echo htmlspecialchars($Info['PseudoAuteur']); ?>" />
				</div>

				<div> 
					Mail de l'auteur : 
					<input maxlength="60" type="text" name="EmailAuteur" value="<?php echo htmlspecialchars($Info['EmailAuteur']); ?>"/>
				</div>

				<div> 
					Titre du commentaire : 
					<input maxlength="60" type="text" name="TitrCom" value="<?php echo htmlspecialchars($Info['TitrCom']); ?>"/>
				</div>

				<div> 
					Contenue du commentaire : 
					<textarea type="text" name="LibCom"/><?php echo htmlspecialchars($Info['LibCom']); ?></textarea>
				</div>

				<div> 
					Article:
					<select type="text" name="LibTitrA"> 
						<option value=""> Choississez un article </option>
						<?php GetList("ARTICLE", true , $Info['NumArt'], "NumArt", "LibTitrA", false, "", "")?>
					</select>
				</div>

				<p><input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="<?php echo $primKey ?>" value="<?php echo $Info[$primKey] ?>" > </p>
			<?php 
			}
		}

		catch (PDOException $e) {
			echo $e;
			$DB->rollBack();
		}		
	?>
	</form>

	
	<p><form action="./AllComment.php"><input type="submit" value="Retour"></form></p>

</body>
</html>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>