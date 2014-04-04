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
include_once 'repositories/orderrepository.php';
if (!isset($_GET['id']))
{
	echo "You entered the page incorrectly, please try again.";
}
else
{
	deleteOrder($connection,$_GET['id']);
	header('Location:index.php?page=manageorders');
}
?>