<?php

	$UnsetTarget = array(
		"NumArt",
		"LibTitrA",
		"LibChapoA",
		"LibAccrochA",
		"Parag1A",
		"LibSsTitr1",
		"Parag2A",
		"LibSsTitr2",
		"Parag3A",
		"LibConclA",
		"UrlPhotA",
		"NomAngl",
		"NomThem",
		"NomLang",
		"MotCle",
	);

	foreach ($UnsetTarget as $key => $value) {
		if (isset($_SESSION[$value])) {
			unset($_SESSION[$value]);
		}
	}

?>