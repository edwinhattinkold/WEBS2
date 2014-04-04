</div></br></br>
<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
<?php
include_once 'functions/checklogin.php';
checkLogin($connection,"admin");
include_once 'repositories/orderrepository.php';
include_once 'repositories/customerrepository.php';
$orders = getAllOrders($connection);
echo "<table class='table table-bordered'><tr><th>Order ID</th><th>Customer name</th><th>Total price</th><th></th></tr>";
foreach($orders as $order)
{
	echo "<tr>";
	$id = $order-> _get("id");
	echo "<td>$id</td>";
	$customer_id = $order->_get("customers_id");
	$customer = getCustomerById($connection,$customer_id);
	$name = $customer->_get("first_name") . " " .  $customer->_get("surname");
	echo "<td>$name</td>";
	$price = getTotalPrice($connection,$id);
	echo "<td>&euro;$price</td>";
	echo "<td><a href='index.php?page=deleteorder&amp;id=$id' onclick=\"return confirm('Are you sure you want to delete this order?');\">Delete</a></td>";
	echo "</tr>";
}
echo "</table>";
?>
</div>