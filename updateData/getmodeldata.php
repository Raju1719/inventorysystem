<?php

	date_default_timezone_set("Asia/Kolkata");
	if($_POST)
	{
		include_once('model.class.php');
		$db = new model();
		$result = $db->getData($_POST['id']);
		echo $result;
	}
		
?>
