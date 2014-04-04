<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php 
include_once 'functions/printproduct.php'; 
?>
<div class="col-md-2">
		<?php include 'functions/submenu.php';?>
</div>
<div class="col-md-9">
	<h2 class="text-center">Products</h2>
	<div class="text-center"><input type="text" id="search-criteria"/></div><hr/>
	<?php 
		if (!isset($_GET['category']))
		{
			printproducts($connection,"");
		}
		else
		{
			printproducts($connection,$_GET['category']);
		}					
	?>	
</div>