<div class="container">
<?php
include_once 'repositories/userrepository.php';
$myusername = $_POST['username'];
$mypassword = $_POST['pass'];
$user = getUserByName($connection,$myusername);
if ($mypassword == $user -> _get("password"))
{
	$_SESSION["username"] = $myusername;
	header( 'Location:index.php?page=login_succes' );
}
else
{
	echo "Wrong username or password, please try again <a href=\"index.php?page=login\">here</a>.";
}
?>
</div>