<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
include_once "model/order.php";
function addOrder($connection,$customer)
{
	$query ="INSERT INTO orders (customers_id) VALUES (?);";
	$stmt = $connection->prepare($query);
	$stmt->bind_param('i',$customer);
	if (!$stmt->execute()) 
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$id = mysqli_insert_id($connection);
	$stmt -> close();
	return $id;
}

function addProductToOrder($connection,$product_id,$order_id,$amount)
{
	$query ="INSERT INTO products_has_orders (products_id,orders_id,amount) VALUES (?,?,?);";
	$stmt = $connection->prepare($query);
	$stmt->bind_param('iii',$product_id,$order_id,$amount);
	if (!$stmt->execute()) 
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$stmt -> close();
}

function getAllOrders($connection)
{
	$query = "SELECT * FROM orders";
	$result =$connection->query($query);
	
	$i = 0;
	$orders = array();
	
	while ($row =$result->fetch_assoc())
	{
		$orders[$i] = new Order();
		foreach ($row as $key => $value) {
			$orders[$i] -> _set($key, $value);
		}
		
		$i++;
	}
	
	$result->close();
	return $orders;
}

function getTotalPrice($connection,$id)
{
	include_once 'repositories/productrepository.php';
	$query = "SELECT * FROM products_has_orders WHERE orders_id = ?;";
	$stmt = $connection->prepare($query);
	$stmt->bind_param('i',$id);
	if (!$stmt->execute()) 
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$result = $stmt->get_result();
	
	$price = 0;
	while ($row = $result->fetch_assoc())
	{
		$product = getProductById($connection,$row["products_id"]);
		$price += ($product->_get("price") * $row["amount"]);
	}
	return $price;
}

function deleteOrder($connection,$id)
{
	$query ="DELETE FROM orders WHERE id=?;";
	$stmt = $connection->prepare($query);
	$stmt->bind_param('i',$id);
	if (!$stmt->execute()) 
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
	$stmt -> close();	
}
?>