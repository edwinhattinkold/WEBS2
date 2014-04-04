<?php
	include_once 'repositories/userrepository.php';
	include_once 'functions/pwenc.php';
	include_once 'functions/validation.php';
	
	if(filterEmail($_POST["email"]))
	{
		$user = new User();
		$customer = new Customer();
		
		$user -> _set("username", $_POST["username"]);
		$user -> _set("password", encrypt($_POST["pass"], $_POST["username"]));
		$user -> _set("rights_right","customer");
		
		$customer -> _set("user_username", $_POST["username"]);
		$customer -> _set("first_name", $_POST["first_name"]);
		$customer -> _set("surname", $_POST["surname"]);
		$customer -> _set("email", $_POST["email"]);
		$customer -> _set("adress", $_POST["adress"]);
		$customer -> _set("zipcode", $_POST["zipcode"]);
		$customer -> _set("city", $_POST["city"]);
		
		addCustomer($connection,$customer,$user);
	}
	else
	{
		echo "Wrong email format.";
	}
?>