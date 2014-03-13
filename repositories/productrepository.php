<?php
	include_once 'model/product.php';
		
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
		$query = "SELECT * FROM products WHERE id = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('i',$id);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$result = $stmt->get_result();
		
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
		$query = "SELECT * FROM products WHERE category_name = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('s',$category);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$result = $stmt->get_result();
		
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
		
		$query ="INSERT INTO products (name,description,price,image,category_name) VALUES (?,?,?,?,?);";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('ssiss',$name,$description,$price,$image,$category_name);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$id = mysqli_insert_id($connection);
		$stmt -> close();
		return $id;
	}
	
	function updateProduct($connection,$product)
	{
		$id = $product -> _get("id");
		$name = $product -> _get("name");
		$description = $product -> _get("description");
		$price = $product -> _get("price");
		$image = $product -> _get("image");
		$category_name = $product -> _get("category_name");
		
		$query ="UPDATE products SET name=?, description=?, price=?, image=?, category_name=? WHERE id=?;";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('ssissi',$name,$description,$price,$image,$category_name,$id);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt -> close();
	}
?>