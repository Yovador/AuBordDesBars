<?php session_start(); ?>

<head>
</head>
<body>
		<?php if(isset($_SESSION['admin'])){

			if ($_SESSION['admin'] == 1) {
				$isAdmin = true;
			}
			else{
				$isAdmin = false;
			}


		} 
		else{
			$isAdmin = false;

		}?>
	</div>
</body>