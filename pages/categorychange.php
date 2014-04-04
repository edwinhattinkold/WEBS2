</div><br /><br />
<?php
		include_once 'functions/checklogin.php';
		checkLogin($connection,"admin");	
	if(isset($_POST["oldname"]))
	{
		include_once 'functions/printcategory.php';
		include_once 'repositories/categoryrepository.php';
		
		$category = new Category();
		$category->_set("name",$_POST["name"]);
		$category->_set("categorytype_name",$_POST["type"]);
		updateCategory($connection,$category,$_POST["oldname"]);
		printcategory($connection);
	}
	else
	{
		header('Location: index.php?page=404');
	}
?>