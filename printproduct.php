<?php
include 'repositories/productrepository.php';
include 'db/connection.php';
function printproduct($id)
{
	$connection = openDB();
	$product = getProductById($connection,$id);
	
	$id = $product -> _get("id");
	$name = $product -> _get("name");
	$price = $product -> _get("price");
	$description = $product -> _get("description");
	$image = $product -> _get("image");
	$category_name = $product -> _get("category_name");
	
	if ($id != null)
	{
		echo "<table class=\"product\">";
		echo "<tr>";
		echo "<th>$name</th>";
		echo "</tr><tr>";
		echo "<td>Article number: $id</td>";
		echo "</tr><tr>";
		echo "<td>Price: &#8364; $price</td>";
		echo "</tr><tr>";
		echo "<td>$description</td>";
		echo "</tr><tr>";
		echo "<td><img src=\"$image\" height=\"300\" width =\"200\" alt=\"$name\"/></td>";
		echo "</tr>";
		echo "</table>";
	}
	else
	{
	echo "<p>The article you are searching for does not exist.</p>";
	}
}
?>