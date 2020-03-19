<h2>Les Langues</h2>

<form action="./FormCreate.php" method="post"> <input  type="submit" name="id" value="Créer une langue" ></form>

	<?php
			include "../General/GetOneEntry.php"; 
			include "../General/connectionBD.php";



			$sqlRequeteAll = 'SELECT * FROM LANGUE';
			$All = $DB->query($sqlRequeteAll);

			while ($info = $All->fetch()) {			
	?>

				<div style="margin: 1rem;">

					<!-- Titre -->
					<div> <?php echo $info['Lib1Lang']; ?> </div>

					<!-- Chapo -->					
					<div> <?php echo $info['Lib2Lang']; ?> </div>

					<div> <?php echo GetOneEntry('frPays', 'PAYS' , 'NumPays' ,$info['NumPays']); ?> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumLang" value="<?php echo $info['NumLang']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumLang" value="<?php echo $info['NumLang']; ?>"></form> </div>


				</div>

	<?php
			}

	 ?>