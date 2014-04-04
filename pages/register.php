<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
<?php
	include_once 'repositories/userrepository.php';
	include_once 'functions/pwenc.php';
	include_once 'functions/validation.php';
	
	if(filterEmail($_POST["email"]))
	{
		if (!validateUsername($_POST["username"],$connection))
		{
			if(validatePassword($_POST["pass"],$_POST["repass"]))
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
				echo "Passwords don't match.";
			}
		}
		else
		{
			echo "This username already exists.";
		}
	}
	else
	{
		echo "Wrong email format.";
	}
?>
</div>