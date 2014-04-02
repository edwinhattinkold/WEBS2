<?php 
session_start();
include_once 'db/connection.php';
$connection = openDB();
include 'functions/header.php'; 

if (isset($_GET['page']))
{
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