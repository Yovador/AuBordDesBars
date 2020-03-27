<div class="header">	


<!-- contour -->

<div class="bordures">
	<div class="vertical-line">
		<div class="left-border"><span></span></div>
		<div class="right-border"><span></span></div>	
	</div>
		<div class="top-border"><hr></div>
</div>

	<!-- Bouton Home -->
	<div class="divflex">
	<div id="titre" > 
		<form action="./index.php" method="post"> 
			<input id="boutonBars" type="submit" name="id" value="Au Bord Des Bars" > 
			<span>
			<input type="hidden" name="isAdmin" value="<?php echo $isAdmin; ?>">
		</form> 
	</div>

	<!-- /bouton home -->

	<?php 
		if (isset($_SESSION['IsConnect']) ){ 
	?>
			<!-- Bouton Deconnection -->
			<div class="deconnection"> 
				Bonjour ! <?php echo $_SESSION['FirstName']; ?> <?php echo $_SESSION['LastName']; ?>
				<form action="./Connection/Deconnect.php" method="post"> 
					<input type="submit" name="id" value="Deconnexion" > 
				</form> 
			</div>
	<?php 
		}
	 	else{ 
	 ?>

			<!-- Bouton Connection -->

			<div class="connection"> 
				<form action="./Connection/Connect.php" method="post"> 
					<input type="submit" name="id" value="Connexion" > 
				</form> 
			</div>

			<!-- Bouton Inscription -->

			<div class="inscription"> 
				<form action="./Connection/FormInscription.php" method="post"> 
					<input type="submit" name="id" value="Inscription" > 
				</form> 
			</div>


	<?php 
		} 
	?>

	
	</div>
</div>