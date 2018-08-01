<?php

	date_default_timezone_set("Asia/Kolkata");
	if($_POST){
		include_once('manufacturer.class.php');
		$db = new manufacturer();
		$result = $db->saveManufacturer($_POST);
		return $result;
	}
		
?>
