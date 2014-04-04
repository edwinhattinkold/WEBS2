</div><br/><br/>
<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
<?php
if ($_SESSION["username"] != null)
{
	echo "Login succesful";
}
else
{
	echo "Login failed";
}
?>
</div>