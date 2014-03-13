<?php
	include_once 'model/menu.php';
		
	function getAllUserMenus($connection)
	{
		$query = "SELECT * FROM menu WHERE menu_name= 'user'";
		$result =$connection->query($query);
		
		$i = 0;
		$menus = array();
		
		while ($row =$result->fetch_assoc())
		{
			$menus[$i] = new Menu();
			foreach ($row as $key => $value) {
				$menus[$i] -> _set($key, $value);
			}
			
			$i++;
		}
		
		$result->close();
		
		return $menus;
	}
?>