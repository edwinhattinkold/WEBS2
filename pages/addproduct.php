<?php
	include_once 'functions/printproduct.php';	
	include_once 'functions/addimage.php';
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
			$product -> _set("image",addImage($_FILES["file"]["name"],$_FILES["file"]["tmp_name"]));
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