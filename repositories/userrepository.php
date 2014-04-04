<?php
	include_once 'model/user.php';
	include_once 'model/customer.php';

	function getUserByName($connection,$name)
	{
		$query = "SELECT * FROM user WHERE username = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('s',$name);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$result = $stmt->get_result();
		
		$user = new User();
		
		while ($row =$result->fetch_assoc())
		{
			foreach ($row as $key => $value) {
				$user -> _set($key, $value);
			}
		}		
		$result->close();		
		return $user;		
	}
	
	function getCustomerByName($connection,$name)
	{
		$query = "SELECT * FROM customers WHERE user_username = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('s',$name);
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
	
	function addCustomer($connection,$customer,$user)
	{
		$username = $user -> _get("username");
		$password = $user -> _get("password");
		$rights_right = $user -> _get("rights_right");
		
		$query ="INSERT INTO user (username,password,rights_right) VALUES (?,?,?);";
		$stmt = $connection->prepare($query);
		$stmt->bind_param('sss',$username,$password,$rights_right);
		if (!$stmt->execute()) 
		{
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt -> close();
		
		$first_name = $customer -> _get("first_name");
		$surname = $customer -> _get("surname");
		$email = $customer -> _get("email");
		$user_username = $customer -> _get("user_username");
		$zipcode = $customer -> _get("zipcode");
		$city = $customer -> _get("city");
		$adress = $customer -> _get("adress");
		
		$query2 ="INSERT INTO customers (first_name,surname,email,user_username,zipcode,city,adress) VALUES (?,?,?,?,?,?,?);";
		if (!$stmt2 = $connection->prepare($query2))
		{ 
			echo 'Error: ' . $connection->error;
			return false;
		}
		else
		{
			$stmt2->bind_param("sssssss",$first_name,$surname,$email,$user_username,$zipcode,$city,$adress);
			if (!$stmt2->execute()) 
			{
				echo "Execute failed: (" . $stmt2->errno . ") " . $stmt2->error;
			}
			$id = mysqli_insert_id($connection);
			$stmt2 -> close();
			return $id;
		}		
	}
?>