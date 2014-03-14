<?php
	include_once 'functions/printproduct.php';		
	$product = new Product();
	if (isset($_POST["name"]))
	{
		$product -> _set("name",$_POST["name"]);
		$product -> _set("description",$_POST["description"]);
		$product -> _set("price",$_POST["price"]);
		$product -> _set("category_name",$_POST["category"]);
		
		if ($_FILES["file"]["error"] > 0)
		{
			echo "No image found, the product will be added without image. You can update this in the change product screen.";
		}
		else
		{
			$allowedExts = array("gif", "jpeg", "jpg", "png", "PNG","GIF","JPEG","JPG");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
			if (in_array($extension,$allowedExts))
			{
				if (file_exists("images/" . $_FILES["file"]["name"]))
				{
					echo $_FILES["file"]["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"]);
				}
				$product -> _set("image","images/".$_FILES["file"]["name"]);
			}
			else
			{
				echo "The file you uploaded is wrong."; 
			}
		}			
		$id = addProduct($connection,$product);
		printProduct($connection,$id);
	}
	else
	{
		echo "Error 404. <br/>";
		echo "The page you tried to access can not be found.";
	}
?>		