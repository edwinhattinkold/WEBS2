<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php 
session_start();
include_once 'db/connection.php';
$connection = openDB();
include 'functions/header.php'; 

if (isset($_GET['page']))
{
	if($_GET['page'] != 'home')
	{
		echo "<div class='container'>home >> " . $_GET['page'] ;
	}
	if (file_exists("pages/".$_GET['page'].".php"))
	{
		include("pages/".$_GET['page'].".php");
	}
	else
	{
		include("pages/404.php");
	}
}
else
{
	include("pages/home.php");
}
include 'functions/footer.php'; 
closeDB($connection);?>