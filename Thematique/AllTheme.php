<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>



<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>

<h2>Les Thematiques</h2>

<form action="./FormCreate.php" method="post"> <input  type="submit" name="id" value="Créer une langue" ></form>

	<?php
			include "../General/GetOneEntry.php"; 
			include "../General/connectionBD.php";



			$sqlRequeteAll = 'SELECT * FROM THEMATIQUE';
			$All = $DB->query($sqlRequeteAll);

			while ($info = $All->fetch()) {			
	?>

				<div style="margin: 1rem;">

					<!-- Titre -->
					<div> <?php echo $info['LibThem']; ?> </div>

					<div> <?php echo GetOneEntry('Lib1Lang', 'LANGUE' , 'NumLang' ,$info['NumLang']); ?> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumThem" value="<?php echo $info['NumThem']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumThem" value="<?php echo $info['NumThem']; ?>"></form> </div>


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