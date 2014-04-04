<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
include_once 'repositories/productrepository.php';
function printproduct($connection,$id)
{
	$product = getProductById($connection,$id);
	
	$id = $product -> _get("id");
	$name = $product -> _get("name");
	$price = $product -> _get("price");
	$description = $product -> _get("description");
	$short_description = $product -> _get("short_description");
	$image = $product -> _get("image");
	$category = $product -> _get("category");
	
	if ($id != null)
	{
		echo "<table class='table'>";
		echo "<tr>";
		echo "<th><h1>$name</h1></th>";
		echo "</tr><tr>";
		echo "<td>Article number: $id</td>";
		echo "</tr><tr>";
		echo "<td>$short_description</td>";
		echo "</tr><tr>";
		echo "<td>Price: &#8364; $price</td>";
		echo "</tr><tr>";
		echo "<td>$description</td>";
		echo "</tr><tr>";
		echo "<td>";
		if ($image != null)
		{
			echo "<a href='index.php?page=imagescreen&amp;image=$image'><img src=\"$image\" height=\"300\" width =\"200\" alt=\"$name\"/ class='thumbnail'/></a>";
		}
		else
		{
			echo "Image not available yet.";
		}
		echo "</td>";
		echo "</tr><tr>";
		echo "<td><h2><a href='index.php?page=addtocart&id=$id'>Add to cart</a></h2></td>";
		echo "</tr></table>";
	}
	else
	{
		echo "<p>The article you are searching for does not exist.</p>";
	}
}

function printadminproducts($connection)
{
	
	$products = getAllProducts($connection);
	echo "<table class='table table-bordered'>";
	echo "<tr><th>Product ID</th><th>Produce name</th><th>Price</th><th>Category</th><th></th><th></th></tr>";
	foreach($products as &$product)
	{
		$id = $product -> _get("id");
		$name = $product -> _get("name");
		$price = $product -> _get("price");
		$category = $product -> _get("category");
		echo "<tr>";
		echo "<td>$id</td>";
		echo "<td>$name</td>";
		echo "<td>$price</td>";
		echo "<td>$category</td>";
		echo "<td><a href='index.php?page=changeproductscreen&productid=$id'>Change</a></td>";
		echo "<td><a href='index.php?page=deleteproduct&productid=$id' onclick=\"return confirm('Are you sure you want to delete $name?');\">Delete</td>";
		echo "</tr>";
	}
	echo "</table>";
}

function printproducts($connection,$category)
{
	if ($category != null)
	{
		$products = getProductsInCategory($connection,$category);
		if ($products == null)
		{
			$products = getProductsInSubcategory($connection, $category);
			if($products == null)
			{
				echo "You entered the wrong category.";
			}
		}
	}
	else
	{
		$products = getAllProducts($connection);
	}
	$counter = 0;
	foreach($products as $product)
	{
		if($counter==0)
		{
			echo "<div class=\"row\">";
		}
		$id = $product -> _get("id");
		$name = $product -> _get("name");
		$price = $product -> _get("price");
		$short_description = $product -> _get("short_description");
		$image = $product -> _get("image");
		$category = $product -> _get("category");
		
		echo "<div class=\"col-md-4 product\">";
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
			echo "<h2><a href=\"index.php?page=product&amp;productid=$id\">$name</a></h2>$short_description\n";
		echo "</div>";
		$counter++;
		if($counter==3)
		{
			echo"</div><br/>";
			$counter=0;
		}
	}
}
?>