<?php 
include_once 'functions/printproduct.php'; 
?>
<!--<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2">
					<?php// include 'functions/submenu.php';?>
			</div>
			<div class="col-md-9">-->
				<h2 class="text-center">Products</h2>
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
			<!--</div>
		</div>
	</div>
</div>-->