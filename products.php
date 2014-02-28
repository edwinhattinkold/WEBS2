<?php 
include 'db/connection.php';
$connection = openDB();
include 'header.php'; 
include 'printproduct.php'; ?>
<div class="row">
	<div class="span 9">
		<div class="row">
			<div class="span2">
					<?php include 'submenu.php';?>
			</div>
			<div class="span7">
				<h2>Products</h2>
				<?php printallproducts($connection); ?>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>