<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
	include_once 'model/category.php';
		
	function getAllMainCategories($connection)
	{
		$query = "SELECT * FROM category WHERE categorytype_name = 'maincategory'";
		$result =$connection->query($query);
		
		$i = 0;
		$categories = array();
		
		while ($row =$result->fetch_assoc())
		{
			$categories[$i] = new Category();
			foreach ($row as $key => $value) {
				$categories[$i] -> _set($key, $value);
			}
			
			$query2 = "SELECT * FROM products WHERE category = '".$categories[$i]->_get("name")."'";
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
	
	function getAllSubCategories($connection)
	{
		$query = "SELECT * FROM category WHERE categorytype_name = 'subcategory'";
		$result =$connection->query($query);
		
		$i = 0;
		$categories = array();
		
		while ($row =$result->fetch_assoc())
		{
			$categories[$i] = new Category();
			foreach ($row as $key => $value) {
				$categories[$i] -> _set($key, $value);
			}
			
			$query2 = "SELECT * FROM products WHERE subcategory = '".$categories[$i]->_get("name")."'";
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
		$query = "SELECT * FROM category WHERE name =?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('s',$name);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$result = $stmt->get_result();
		
		$category = new Category();
		
		while ($row =$result->fetch_assoc())
		{
			foreach ($row as $key => $value) {
				$category -> _set($key, $value);
			}
			
			$query2 = "SELECT * FROM products WHERE category = '".$category->_get("name")."'";
			$result2 = $connection->query($query2);
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
		return $category;		
	}
	
	function addCategory($connection,$category)
	{
		$name = $category->_get("name");
		$categorytype_name = $category->_get("categorytype_name");
		
		$query = "INSERT INTO category (name,categorytype_name) VALUES (?,?);";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('ss',$name,$categorytype_name);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$id = mysqli_insert_id($connection);
		$stmt -> close();
		return $id;
	}
	
	function updateCategory($connection,$category,$oldname)
	{
		$name = $category->_get("name");
		$categorytype_name = $category->_get("categorytype_name");
		
		$query ="UPDATE category SET name=?, categorytype_name=? WHERE name=?;";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('sss',$name,$categorytype_name,$oldname);
	}
	
	function deleteCategory($connection,$name)
	{
		$query ="DELETE FROM category WHERE name=?;";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('s',$name);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt -> close();
	}
?>