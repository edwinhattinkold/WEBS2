<?php
	include 'model/product.php';
		
	function getAllCustomers($connection)
	{
		$query = "SELECT * FROM products";
		$result =$connection->query($query);
		
		$i = 0;
		$products = array();
		
		while ($row =$result->fetch_assoc())
		{
			$id = $row["id"];
			$name = $row["name"];
			$price = $row["price"];
			$description = $row["description"];
			$category_id = $row["category_id"];
			
			$products[$i] = new Product();
			$products[$i] -> _set("id",$id);
			$products[$i] -> _set("name",$name);
			$products[$i] -> _set("price",$price);
			$products[$i] -> _set("description",$description);
			$products[$i] -> _set("category_id",$category_id);
			
			$i++;
		}
		
		$result->close();
		
		return $students;
	}
?>