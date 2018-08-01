<?php
	date_default_timezone_set("Asia/Kolkata");
	if($_POST){
			include_once('model.class.php');
			$db = new model();
			$result = $db->deleteModel($_POST['id']);
			return $result;
		}
		
?>
