<?php
	include 'model/progress.php';
		
	function getAllProgress($connection)
	{
		$query = "SELECT * FROM progress";
		$result =$connection->query($query);
		
		$i = 0;
		$progress = array();
		
		while ($row =$result->fetch_assoc())
		{
			$progress[$i] = new Progress();
			foreach ($row as $key => $value) {
				$progress[$i] -> _set($key, $value);
			}
			
			$i++;
		}
		
		$result->close();
		
		return $progress;
	}
?>