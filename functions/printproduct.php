<?php
include_once 'repositories/productrepository.php';
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
		echo "<th><h1>$name</h1></th>";
		echo "</tr><tr>";
		echo "<td>Article number: $id</td>";
		echo "</tr><tr>";
		echo "<td>Price: &#8364; $price</td>";
		echo "</tr><tr>";
		echo "<td>$description</td>";
		echo "</tr><tr>";
		echo "<td>";
		if ($image != null)
		{
			echo "<img src=\"$image\" height=\"300\" width =\"200\" alt=\"$name\"/ class='thumbnail'>";
		}
		else
		{
			echo "Image not available yet.";
		}
		echo "</td>";
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
	foreach($products as &$product)
	{
		if($counter==0)
		{
			echo "<div class=\"row\">";
		}
		$id = $product -> _get("id");
		$name = $product -> _get("name");
		$price = $product -> _get("price");
		$description = $product -> _get("description");
		$image = $product -> _get("image");
		$category_name = $product -> _get("category_name");
		
		echo "<div class=\"col-md-4\">";
			echo "<p><a href=\"index.php?page=product&amp;productid=$id\">\n";
			if ($image != null)
			{
				echo "<img src=\"$image\" height=\"300\" width =\"200\" alt=\"$name\"/>\n";
			}
			else
			{
				echo "Image not available yet.\n";
			}
			echo "</a></p>\n";
			echo "<h2><a href=\"index.php?page=product&amp;productid=$id\">$name</a></h2>\n";
		echo "</div>";
		$counter++;
		if($counter==3)
		{
			echo"</div>";
			echo"<hr>";
			$counter=0;
		}
	}
}
?>