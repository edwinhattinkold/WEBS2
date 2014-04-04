</div></br></br>
<?php
	include_once 'functions/checklogin.php';
	checkLogin($connection, "admin");
	include_once 'repositories/categoryrepository.php';
	
	if(!isset($_GET['name']))
	{
		echo "You entered the page incorrectly, please try again.";
	}
	else
	{
		deleteCategory($connection,$_GET['name']);
		header('Location:index.php?page=changecategory');
	}
?>