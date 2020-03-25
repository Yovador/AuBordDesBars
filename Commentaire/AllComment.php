<?php include "../General/isAdmin.php" //$IsAdmin == true si Admin ?>

<?php if ($isAdmin) { ?>

<div> <form action="../index.php" method="post"> <input  type="submit" name="id" value="HOME" > <input  type="hidden" name="isAdmin" value="<?php echo "true"; ?>"></form> </div>

<h2>Les Commentaires</h2>

<form action="./FormCreate.php" method="post"> <input  type="submit" name="id" value="Créer un Commentaire" ></form>

	<?php
			include "../General/GetOneEntry.php"; 
			include "../General/connectionBD.php";



			$sqlRequeteAll = 'SELECT * FROM COMMENT ORDER BY DtCreC DESC';
			$All = $DB->query($sqlRequeteAll);

			while ($info = $All->fetch()) {			
	?>

				<div style="margin: 1rem;">

					<!-- Date Creation -->
					<div> <?php echo $info['DtCreC']; ?> </div>

					<!-- Pseudo Auteur -->
					<div> <?php echo $info['PseudoAuteur']; ?> </div>

					<!-- Mail Auteur -->
					<div> <?php echo $info['EmailAuteur']; ?> </div>

					<!-- Contenue -->
					<div> <?php echo $info['TitrCom']; ?> </div>

					<!-- Contenue -->
					<div> <?php echo $info['LibCom']; ?> </div>

					<!-- Article -->
					<div> <?php echo GetOneEntry('LibTitrA', 'Article' , 'NumArt' ,$info['NumArt']); ?> </div>

					<!-- Bouton Modifier -->
					<div> <form action="./FormUpdate.php" method="post"> <input  type="submit" name="id" value="Modifier" > <input  type="hidden" name="NumCom" value="<?php echo $info['NumCom']; ?>"></form> </div>

					<!-- Bouton Supprimer -->
					<div> <form action="./Delete.php" method="post"> <input  type="submit" name="id" value="Supprimer" > <input  type="hidden" name="NumCom" value="<?php echo $info['NumCom']; ?>"></form> </div>


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