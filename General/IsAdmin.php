<form action="index.php" method="post"> <input  type="submit" name="id" value="Passer Admin" > <input  type="hidden" name="isAdmin" value="true"></form>

<form action="index.php" method="post"> <input  type="submit" name="id" value="Passer User" > <input  type="hidden" name="isAdmin" value="false"></form>

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