<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
	include_once 'model/customer.php';
	
	function getCustomerById($connection,$id)
	{
		$query = "SELECT * FROM customers WHERE id = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('i',$id);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$result = $stmt->get_result();
		
		$customer = new Customer();
		
		while ($row =$result->fetch_assoc())
		{
			foreach ($row as $key => $value) {
				$customer -> _set($key, $value);
			}
		}		
		$result->close();		
		return $customer;		
	}

?>