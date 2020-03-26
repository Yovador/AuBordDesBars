<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>


<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>

<h2>Les Mots Clés</h2>

<form action="./FormCreate.php" method="post"> <input  type="submit" name="id" value="Créer Mot Clé" ></form>

	<?php
			include "../General/GetOneEntry.php"; 
			include "../General/connectionBD.php";



			$sqlRequeteAll = 'SELECT * FROM MOTCLE';
			$All = $DB->query($sqlRequeteAll);

			while ($info = $All->fetch()) {			
	?>

				<div style="margin: 1rem;">

					<!-- Titre -->
					<div> <?php echo $info['LibMoCle']; ?> </div>

					<div> <?php echo GetOneEntry('Lib1Lang', 'LANGUE' , 'NumLang' ,$info['NumLang']); ?> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumMoCle" value="<?php echo $info['NumMoCle']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumMoCle" value="<?php echo $info['NumMoCle']; ?>"></form> </div>


				</div>

	<?php
			}

	 ?>

<?php 
}
else{
	header('Location: ../index.php');
	exit();
	} 

?>