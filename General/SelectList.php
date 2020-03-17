<?php 

	if (!function_exists("GetList")) {
		function GetList($table, $UpdateMode ,$Selected, $PrimKey, $key)
		{
			include "connectionBD.php";
			$Get = $DB->query('SELECT * FROM '.$table.' ');


			while ($List = $Get->fetch()) {
				$cleanString = htmlspecialchars($List[$key]);
				if ($UpdateMode) {
					if ($Selected == $List[$PrimKey]) {
						?> <option value = "<?php echo $cleanString;?>" selected> <?php echo $List[$key];?> </option>; <?php 
					}
					else{
						?> <option value = "<?php echo $cleanString;?>"> <?php echo $List[$key];?> </option>; <?php 
					}
				}
				else{
					?> <option value = "<?php echo $cleanString;?>"> <?php echo $List[$key];?> </option>; <?php
				}
				
			}
		}
	}
		
	


 ?>