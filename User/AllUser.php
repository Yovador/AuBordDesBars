<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>

<h2>Les Users</h2>

<form action="./FormCreate.php" method="post"> <input  type="submit" name="id" value="Créer un User" ></form>

	<?php
			include "../General/GetOneEntry.php"; 
			include "../General/connectionBD.php";



			$sqlRequeteAll = 'SELECT * FROM USER ORDER BY LastName ASC';
			$All = $DB->query($sqlRequeteAll);

			while ($info = $All->fetch()) {			
	?>

				<div style="margin: 1rem;">

					<!-- Last Name -->
					<div> <?php echo $info['LastName']; ?> </div>

					<!-- First Name -->
					<div> <?php echo $info['FirstName']; ?> </div>

					<!-- Mail -->
					<div> <?php echo $info['EMail']; ?> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="Login" value="<?php echo $info['Login']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="Login" value="<?php echo $info['Login']; ?>"></form> </div>


				</div>

	<?php
			}

	 ?>