<?php
	function printcategory($connection)
	{
		$categories = getAllMainCategories($connection);
		$subcategories = getAllSubCategories($connection);
		
		echo "<table class='table table-bordered'>";
		echo "<tr><th>Category name</th><th>Category type</th><th></th><th></th></tr>";
		foreach($categories as $category)
		{
			$name = $category->_GET("name");
			$categorytype_name = $category->_GET("categorytype_name");
			
			echo "<tr>";
			echo "<td>$name</td>";
			echo "<td>$categorytype_name</td>";
			echo "<td><a href='index.php?page=changecategoryscreen&amp;name=$name' >Change</a></td>";
			echo "<td><a href='index.php?page=deletecategory&amp;name=$name' onclick=\"return confirm('Are you sure you want to delete $name?');\">Delete</td>";
			echo "</tr>";
		}
		foreach($subcategories as $subcategory)
		{
			$name = $subcategory->_GET("name");
			$categorytype_name = $subcategory->_GET("categorytype_name");
			
			echo "<tr>";
			echo "<td>$name</td>";
			echo "<td>$categorytype_name</td>";
			echo "<td><a href='index.php?page=changecategoryscreen&amp;name=$name'>Change</a></td>";
			echo "<td><a href='index.php?page=deletecategory&amp;name=$name' onclick=\"return confirm('Are you sure you want to delete $name?');\">Delete</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>