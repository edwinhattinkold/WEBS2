<?php
include 'repositories/productrepository.php';
function printproduct($connection,$id)
{
	$product = getProductById($connection,$id);
	
	$id = $product -> _get("id");
	$name = $product -> _get("name");
	$price = $product -> _get("price");
	$description = $product -> _get("description");
	$image = $product -> _get("image");
	$category_name = $product -> _get("category_name");
	
	if ($id != null)
	{
		echo "<table class='table'>";
		echo "<tr>";
		echo "<th>$name</th>";
		echo "</tr><tr>";
		echo "<td>Article number: $id</td>";
		echo "</tr><tr>";
		echo "<td>Price: &#8364; $price</td>";
		echo "</tr><tr>";
		echo "<td>$description</td>";
		echo "</tr><tr>";
		echo "<td><img src=\"$image\" height=\"300\" width =\"200\" alt=\"$name\"/ class='thumbnail'></td>";
		echo "</tr>";
		echo "</table>";
	}
	else
	{
		echo "<p>The article you are searching for does not exist.</p>";
	}
}

function printproducts($connection,$category)
{
	if ($category != null)
	{
		$products = getProductsInCategory($connection,$category);
		if ($products == null)
		{
			echo "You entered the wrong category.";
		}
	}
	else
	{
		$products = getAllProducts($connection);
	}
	$counter = 0;
	echo "<table class='table text-center'>";
	foreach($products as &$product)
	{
		if ($counter == 0)
		{
			echo "<tr>";
		}
		$id = $product -> _get("id");
		$name = $product -> _get("name");
		$price = $product -> _get("price");
		$description = $product -> _get("description");
		$image = $product -> _get("image");
		$category_name = $product -> _get("category_name");
		
		echo "<td><a href=\"product.php?productid=$id\">$name</a></td>";
		echo "<td><a href=\"product.php?productid=$id\" class='thumbnail'><img src=\"$image\" height=\"300\" width =\"200\" alt=\"$name\"/></a></td>";
		$counter++;
		
		if ($counter == 3)
		{
			echo "</tr>
			";
			$counter = 0;
		}
		echo "";
	}
	echo "</table>";
}
?>