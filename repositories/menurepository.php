<?php
	include 'model/menu.php';
		
	function getAllMenus($connection)
	{
		$query = "SELECT * FROM menu";
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
	
	function getMenuById($connection, $id)
	{
		$query = "SELECT * FROM menus WHERE id = '".$id."'";
		$result =$connection->query($query);
		
		$menu = new Menu();
		
		while ($row =$result->fetch_assoc())
		{
			foreach ($row as $key => $value) {
				$menu -> _set($key, $value);
			}
		}		
		$result->close();		
		return $menu;
	}
?>