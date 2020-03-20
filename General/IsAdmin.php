<head>
	<link  href="assets/css/index.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head>

<body>

	<form id="bouttonAdmin" action="index.php" method="post"> <input  type="submit" name="id" value="Passer Admin" > <input  type="hidden" name="isAdmin" value="true"></form>

	<form id="bouttonVisiteur" action="index.php" method="post"> <input  type="submit" name="id" value="Passer User" > <input  type="hidden" name="isAdmin" value="false"></form>
	<div class="indicateur">
		<?php if(isset($_POST['isAdmin'])){

			if ($_POST['isAdmin'] == "true") {
				echo "Admin","<br>";
				$isAdmin = true;
			}
			else{
				echo "Not Admin","<br>";
				$isAdmin = false;
			}


		} 
		else{
			echo "Not Admin","<br>";
			$isAdmin = false;

		}?>
	</div>
</body>