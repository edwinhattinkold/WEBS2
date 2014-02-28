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
				<?php 
					if (!isset($_GET['category']))
					{
						echo "<p>You entered the page incorrectly, please try again.</p>";
					}
					else
					{
						printproductsincategory($connection,$_GET['category']);
					}					
				?>				
			</div>
		</td>
	</tr>
</table>
<?php include 'footer.php'; ?>