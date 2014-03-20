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