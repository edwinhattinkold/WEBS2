<?php
function checkLogin($connection,$right)
{
	if (!isset($_SESSION["username"]))
	{
		//header('Location: index.php?page=accesdenied');
	}
	else
	{
		include_once 'repositories/userrepository.php';
		$user = getUserByName($connection,$_SESSION["username"]);
		if($user->_get("rights_right") != $right)
		{
			header('Location: index.php?page=accesdenied');
		}
	}
}
?>