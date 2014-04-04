<br/><br/></div>
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
$myusername = $_POST['username'];
$mypassword = $_POST['pass'];
$user = getUserByName($connection,$myusername);
if (encrypt($mypassword,$myusername) == $user -> _get("password"))
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