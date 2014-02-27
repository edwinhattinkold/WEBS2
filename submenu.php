<table id="submenu">
	<?php
		include 'repositories/categoryrepository.php';
		
		$categories = getAllCategories($connection);
		
		foreach($categories as &$category)
		{
			$name = $category -> _get("name");
			$description = $category -> _get("description");
			
			echo "<tr>";
			echo "<td><a href=\"category.php?category=$name\">$name</a></td>";
			echo "</tr>";
		}
	?>
</table>