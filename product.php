<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php'; 
include 'functions/printproduct.php'; ?>
	<div class="row">
		<div class="span2">
			<?php include 'functions/submenu.php';?>
		</div>
		<div class="span10">
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
<?php include 'functions/footer.php'; ?>