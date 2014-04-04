<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
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
	function getAllAdminMenus($connection)
	{
		$query = "SELECT * FROM menu WHERE menu_name= 'admin'";
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