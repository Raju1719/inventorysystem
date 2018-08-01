<?php

	date_default_timezone_set("Asia/Kolkata");
	if($_POST)
	{
		if(isset($_FILES["image_upload1"]) && $_FILES["image_upload1"]["error"] == 0)
		{
	        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
	        $filename = $_FILES["image_upload1"]["name"];
	        $filetype = $_FILES["image_upload1"]["type"];
	        $filesize = $_FILES["image_upload1"]["size"];
	    
	        // Verify file extension
	        $ext = pathinfo($filename, PATHINFO_EXTENSION);
	        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
	    
	        // Verify MYME type of the file
	        if(in_array($filetype, $allowed)){
	            // Check whether file exists before uploading it
	            
	                move_uploaded_file($_FILES["image_upload1"]["tmp_name"], "../uploads/" . $_FILES["image_upload1"]["name"]);
	                //echo "Your file was uploaded successfully.";
	            
	        } else{
	            echo "Error: There was a problem uploading your file. Please try again."; 
	        }
	    } 
	    else
	    {
	        echo "Error: " . $_FILES["image_upload1"]["error"];
	    }
		
		if(isset($_FILES["image_upload2"]) && $_FILES["image_upload2"]["error"] == 0)
		{
	        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
	        $filename2 = $_FILES["image_upload2"]["name"];
	        $filetype = $_FILES["image_upload2"]["type"];
	        $filesize = $_FILES["image_upload2"]["size"];
	    
	        // Verify file extension
	        $ext = pathinfo($filename2, PATHINFO_EXTENSION);
	        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
	    
	        // Verify MYME type of the file
	        if(in_array($filetype, $allowed)){
	            // Check whether file exists before uploading it
	            
	                move_uploaded_file($_FILES["image_upload2"]["tmp_name"], "../uploads/" . $_FILES["image_upload2"]["name"]);
	                //echo "Your file was uploaded successfully.";
	            
	        } else{
	            echo "Error: There was a problem uploading your file. Please try again."; 
	        }
	    } 
	    else
	    {
	        echo "Error: " . $_FILES["image_upload2"]["error"];
	    }

		include_once('model.class.php');
		$db = new model();
		$result = $db->saveModel($_POST,$filename,$filename2);
		return $result;
	}
		
?>
