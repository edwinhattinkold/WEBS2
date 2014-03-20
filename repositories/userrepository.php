<?php
	include_once 'model/user.php';
		
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
?>