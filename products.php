<?php 
include 'db/connection.php';
$connection = openDB();
include 'header.php'; 
include 'printproduct.php'; ?>
<table>
	<tr>
		<td>
			<?php include 'submenu.php';?>
		</td>
		<td>
			<div id = "tekst">
				<h2>Product</h2>
				
				<?php printallproducts($connection); ?>
				
			</div>
		</td>
	</tr>
</table>
<?php
closeDB($connection);
?>
<?php include 'footer.php'; ?>