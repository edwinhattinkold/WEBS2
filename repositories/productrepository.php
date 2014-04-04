<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
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
		$query = "SELECT * FROM products WHERE category = ?";
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
	
	function getProductsInSubcategory($connection,$category)
	{
		$query = "SELECT * FROM products WHERE subcategory = ?";
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
		$short_description = $product -> _get("short_description");
		$price = $product -> _get("price");
		$image = $product -> _get("image");
		$category = $product -> _get("category");
		$subcategory = $product -> _get("subcategory");
		
		$query ="INSERT INTO products (name,description,price,image,category,short_description,subcategory) VALUES (?,?,?,?,?,?,?);";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('ssissss',$name,$description,$price,$image,$category,$short_description,$subcategory);
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
		$category = $product -> _get("category");
		$subcategory = $product -> _get("subcategory");
		$short_description = $product -> _get("short_description");
		
		$query ="UPDATE products SET name=?, description=?, price=?, image=?, category=?, short_description=?, subcategory=? WHERE id=?;";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('ssissssi',$name,$description,$price,$image,$category,$short_description,$subcategory,$id);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt -> close();
	}
	
	function deleteProduct($connection,$id)
	{		
		$query ="DELETE FROM products WHERE id=?;";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('i',$id);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt -> close();
	}
?>