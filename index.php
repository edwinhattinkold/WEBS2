<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php'; 
?>
<div class="row">
<?php
if (isset($_GET['page']))
{
	if (file_exists("".$_GET['page'].".php"))
	{
		include("".$_GET['page'].".php");
	}
	else
	{
		include("404.php");
	}
}
else
{
	include("home.php");
}	
?>
</div>
<?php include 'functions/footer.php'; ?>