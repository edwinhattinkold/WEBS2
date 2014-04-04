<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
function filterEmail($input)
{
	return filter_var($input,FILTER_VALIDATE_EMAIL);
}

function filterInt($input)
{
	return is_int($input);
}

function validateUsername($input,$connection)
{
	include_once 'repositories/userrepository.php';
	$user = getUserByName($connection,$input);
	return ($user->_get("username")!="");
}

function validatePassword($input,$reinput)
{
	return $input == $reinput;
}
?>