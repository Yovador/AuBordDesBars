<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>
	<?php include "../General/SelectList.php";
	$primKey = "Login";?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Modifier un User - Au Bord Des Bars</title>
	</head>
	<body>
		<h2>Modifier un User</h2>
		<form action="Update.php" method="post">
		<?php 

			include "../General/connectionBD.php";

			try {
				$request = $DB->query('SELECT * FROM USER WHERE '.$primKey.' ="'.$_POST[$primKey].'" ');
				while ($Info = $request->fetch(PDO::FETCH_ASSOC)) {
				?>	
					<div> 
						Prénom : 
						<input maxlength="60" type="text" name="FirstName" value="<?php echo htmlspecialchars($Info['FirstName']); ?>"/>
					</div>

					<div> 
						Nom de Famille : 
						<input maxlength="60" type="text" name="LastName" value="<?php echo htmlspecialchars($Info['LastName']); ?>"/>
					</div>

					<div> 
						Adresse Mail : 
						<input maxlength="60" type="text" name="EMail" value="<?php echo htmlspecialchars($Info['EMail']); ?>"/>
					</div>

					<div> 
						Is Admin ? 
						<input type="checkbox" name="admin" <?php if( $Info['admin']==1){echo "checked";} ?> />
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

		
		<p><form action="./AllUser.php"><input type="submit" value="Retour"></form></p>

	</body>
	</html>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>