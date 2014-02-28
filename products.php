<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php'; 
include 'functions/printproduct.php'; ?>
<div class="row">
	<div class="span 9">
		<div class="row">
			<div class="span2">
					<?php include 'functions/submenu.php';?>
			</div>
			<div class="span7">
				<h2>Products</h2>
				<?php printallproducts($connection); ?>
			</div>
		</div>
	</div>
</div>
<?php include 'functions/footer.php'; ?>