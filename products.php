<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php'; 
include 'functions/printproduct.php'; ?>
<div class="row">
	<div class="span 9">
		<div class="row">
			<div class="col-md-2">
					<?php include 'functions/submenu.php';?>
			</div>
			<div class="col-md-7">
				<h2>Products</h2>
				<?php 
					if (!isset($_GET['category']))
					{
						printallproducts($connection);
					}
					else
					{
						printproductsincategory($connection,$_GET['category']);
					}					
				?>	
			</div>
		</div>
	</div>
</div>
<?php include 'functions/footer.php'; ?>