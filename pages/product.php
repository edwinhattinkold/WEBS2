<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php 
if(isset($_GET['productid']))
{
	echo " >> " . $_GET['productid'] . "</div></br></br>";
}
include_once 'functions/printproduct.php';
?>
<div class="row">
	<div class="col-md-2">
		<?php include 'functions/submenu.php';?>
	</div>
	<div class="col-md-7">
		<?php
				if (!isset($_GET['productid']))
				{
					echo "<p>You entered the page incorrectly, please try again.</p>";
				}
				else
				{
					printproduct($connection,$_GET['productid']);
				}					
			?>	
	</div>
</div>