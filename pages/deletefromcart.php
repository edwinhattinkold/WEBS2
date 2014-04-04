</div>
<?php
if (!isset($_GET['id']))
{
	echo "You entered the page incorrectly, please try again.";
}
else
{
	if(($key = array_search($_GET['id'], $_SESSION['cart'])) !== false) {
		unset($_SESSION['cart'][$key]);
	}
	header('Location: index.php?page=cart');
}
?>