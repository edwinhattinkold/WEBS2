<div class="container">
	<?php
		include_once 'functions/checklogin.php';
		checkLogin($connection,"admin");	
		include_once 'functions/printcategory.php';
		echo "<a href='index.php?page=addcategoryscreen'>Add Category</a>";
		printcategory($connection);
	?>
</div>