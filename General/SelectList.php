<?php 

	if (!function_exists("GetList")) {
		function GetList($table, $UpdateMode ,$Selected, $PrimKey, $key)
		{
			include "connectionBD.php";
			$Get = $DB->query('SELECT * FROM '.$table.' ');

			while ($List = $Get->fetch()) {
				if ($UpdateMode) {
					if ($Selected == $List[$PrimKey]) {
						echo "<option value ='",$List[$key],"' selected>", $List[$key], "</option>";
					}
					else{
						echo "<option value ='",$List[$key],"'>", $List[$key], "</option>";
					}
				}
				else{
					echo "<option value ='",$List[$key],"'>", $List[$key], "</option>";
				}
				
			}
		}
	}
		
	


 ?>