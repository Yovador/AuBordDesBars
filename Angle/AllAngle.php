<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>

<h2>Les Angles</h2>

<form action="./FormCreate.php" method="post"> <input  type="submit" name="id" value="Créer une langue" ></form>

	<?php
			include "../General/GetOneEntry.php"; 
			include "../General/connectionBD.php";



			$sqlRequeteAll = 'SELECT * FROM ANGLE';
			$All = $DB->query($sqlRequeteAll);

			while ($info = $All->fetch()) {			
	?>

				<div style="margin: 1rem;">

					<!-- Titre -->
					<div> <?php echo $info['LibAngl']; ?> </div>

					<div> <?php echo GetOneEntry('Lib1Lang', 'LANGUE' , 'NumLang' ,$info['NumLang']); ?> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumAngl" value="<?php echo $info['NumAngl']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumAngl" value="<?php echo $info['NumAngl']; ?>"></form> </div>


				</div>

	<?php
			}

	 ?>