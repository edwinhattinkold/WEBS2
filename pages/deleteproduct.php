</div>
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
include_once 'repositories/productrepository.php';
if (!isset($_GET['productid']))
{
	echo "You entered the page incorrectly, please try again.";
}
else
{
	deleteProduct($connection,$_GET['productid']);
	header('Location:index.php?page=adminproductlist');
}
?>