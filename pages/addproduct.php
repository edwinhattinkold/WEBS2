<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
include_once 'functions/checklogin.php';
checkLogin($connection,"admin");
include_once 'functions/printproduct.php';	
include_once 'functions/addimage.php';
$product = new Product();
if (isset($_POST["name"]))
{
	$product -> _set("name",$_POST["name"]);
	$product -> _set("description",$_POST["description"]);
	$product -> _set("price",$_POST["price"]);
	$product -> _set("category",$_POST["category"]);
	$product -> _set("short_description",$_POST["short_description"]);
	$product -> _set("subcategory",$_POST["subcategory"]);
	
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
	header('Location: index.php?page=404');
}
?>		