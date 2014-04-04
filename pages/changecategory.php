<div class="container">
	<?php
	include_once 'functions/checklogin.php';
	checkLogin($connection,"admin");	
	/*if(isset($_POST["oldname"]))
	{
		include_once 'functions/printcategory.php';
		$category->_set("name",$_POST["name"]);
		$category->_set("categorytype_name",$_POST["categorytype_name"]);
		updateCategory($connection,$category,$_POST["oldname"]);
		printcategory($connection);
	}
	else
	{
		header('Location: index.php?page=404');
	}*/
	include_once 'functions/printcategory.php';
	echo "<a href='index.php?page=addcategoryscreen'>Add Category</a>";
	printcategory($connection);
	?>
</div>