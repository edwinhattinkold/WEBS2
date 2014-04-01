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
?>