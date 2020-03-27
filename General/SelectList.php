<?php 

	if (!function_exists("GetList")) {
		function GetList($table, $UpdateMode ,$Selected, $PrimKey, $key, $filterOn ,$discriminant, $equalto)
		{
			include "connectionBD.php";
			if ($filterOn) {
				$Get = $DB->query('SELECT * FROM '.$table.' WHERE '.$discriminant.' = "'.$equalto.'"'  );
			}
			else {
				$Get = $DB->query('SELECT * FROM '.$table.''  );
			}
			


			while ($List = $Get->fetch()) {
				$cleanString = htmlspecialchars($List[$key]);
				if ($UpdateMode) {
					if ($Selected == $List[$PrimKey]) {
						?> <option value = "<?php echo $cleanString;?>" selected> <?php echo $cleanString;?> </option>; <?php 
					}
					else{
						?> <option value = "<?php echo $cleanString;?>"> <?php echo $cleanString;?> </option>; <?php 
					}
				}
				else{
					?> <option value = "<?php echo $cleanString;?>"> <?php echo $cleanString;?> </option>; <?php
				}
				
			}
		}
	}
		
	


 ?>