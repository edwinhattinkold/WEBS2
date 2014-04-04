</div>
<?php
	include_once 'functions/checklogin.php';
	checkLogin($connection,"admin");
	include_once 'functions/printcategory.php';
	
	$category = new Category();
	if(isset($_POST["name"]))
	{
		$category->_set("name",$_POST["name"]);
		$category->_set("categorytype_name",$_POST["type"]);
		
		$id = addCategory($connection,$category);
		printcategory($connection);
	}
	else
	{
		header('Location: index.php?page=404');
	}
?>