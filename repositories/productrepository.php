<?php
	include 'model/product.php';
		
	function getAllProducts($connection)
	{
		$query = "SELECT * FROM products";
		$result =$connection->query($query);
		
		$i = 0;
		$products = array();
		
		while ($row =$result->fetch_assoc())
		{
			$products[$i] = new Product();
			foreach ($row as $key => $value) {
				$products[$i] -> _set($key, $value);
			}
			
			$i++;
		}
		
		$result->close();
		return $products;
	}
	
	function getProductById($connection,$id)
	{
		$query = "SELECT * FROM products WHERE id = '".$id."'";
		$result =$connection->query($query);
		
		$product = new Product();
		
		while ($row =$result->fetch_assoc())
		{
			foreach ($row as $key => $value) {
				$product -> _set($key, $value);
			}
		}		
		$result->close();		
		return $product;		
	}
	
	function getProductsInCategory($connection,$category)
	{
		$query = "SELECT * FROM products WHERE category_name = '".$category."'";
		$result =$connection->query($query);
		
		$i = 0;
		$products = array();
		
		while ($row =$result->fetch_assoc())
		{
			$products[$i] = new Product();
			foreach ($row as $key => $value) {
				$products[$i] -> _set($key, $value);
			}
			
			$i++;
		}
		
		$result->close();
		return $products;
	}
	
	function addProduct($connection,$product)
	{
		$name = $product -> _get("name");
		$description = $product -> _get("description");
		$price = $product -> _get("price");
		$image = $product -> _get("image");
		$category_name = $product -> _get("category_name");
		
		$query ="INSERT INTO products (name,description,price,image,category_name) VALUES ('$name','$description','$price','$image','$category_name');";
		if (!mysqli_query($connection,$query))
		{
			die('Error: ' . mysqli_error($connection));
		}
		$id = mysqli_insert_id($connection);
		return $id;
	}
?>