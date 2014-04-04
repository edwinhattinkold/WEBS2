<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
<?php
include_once 'functions/checklogin.php';
checkLogin($connection,"admin");
if (isset($_POST["name"]))
{
	include_once 'functions/printproduct.php';		
	$product = new Product();
	$product -> _set("id",$_POST["id"]);
	$product -> _set("name",$_POST["name"]);
	$product -> _set("description",$_POST["description"]);
	$product -> _set("price",$_POST["price"]);
	$product -> _set("category",$_POST["category"]);
	$product -> _set("short_description",$_POST["short_description"]);
	$product -> _set("subcategory",$_POST["subcategory"]);
	
	if ($_FILES["file"]["error"] > 0)
	{
		echo "No image found, the old image stays.<br/>";
		$product -> _set("image",$_POST["hiddenimage"]);
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
			echo "The file you uploaded is wrong, we keep the old image."; 
			$product -> _set("image",$_POST["hiddenimage"]);
		}
	}
	updateProduct($connection,$product);
	printproduct($connection,$product -> _get("id"));
}
else
{
	header('Location: index.php?page=404');
}
?>		
</div>