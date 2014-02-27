<?php
	include 'model/category.php';
		
	function getAllCategories($connection)
	{
		$query = "SELECT * FROM category";
		$result =$connection->query($query);
		
		$i = 0;
		$categories = array();
		
		while ($row =$result->fetch_assoc())
		{
			$categories[$i] = new Category();
			foreach ($row as $key => $value) {
				$categories[$i] -> _set($key, $value);
			}
			
			$query2 = "SELECT * FROM products WHERE category_name = '".$categories[$i]->_get("name")."'";
			$result2 = $connection->query($query2);
			$j = 0;
			$product_ids = array();
			while($row = $result2->fetch_assoc())
			{
				$product_ids[$j] = $row["id"];
				$j++;
			}
			$categories[$i] -> _set("product_ids",$product_ids);
			
			$i++;
		}
		
		$result->close();
		return $categories;
	}
	
	function getCategoryByName($connection,$name)
	{
		$query = "SELECT * FROM category WHERE name = '".$name."'";
		$result =$connection->query($query);
		
		$category = new Category();
		
		while ($row =$result->fetch_assoc())
		{
			foreach ($row as $key => $value) {
				$category -> _set($key, $value);
			}
			
			$query2 = "SELECT * FROM products WHERE category_name = '".$category->_get("name")."'";
			$result2 = $connection->query($query5);
			$j = 0;
			$product_ids = array();
			while($row = $result2->fetch_assoc())
			{
				$product_ids[$j] = $row["id"];
				$j++;
			}
			$category -> _set("product_ids",$product_ids);
		}
		$result->close();		
		return category;		
	}
?>