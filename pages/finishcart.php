<?php
include_once 'functions/checklogin.php';
checkLogin($connection,"customer");
include_once 'repositories/orderrepository.php';
include_once 'repositories/userrepository.php';
include_once 'repositories/productrepository.php';
if (isset($_SESSION['cart']))
{
	$customer = getCustomerByName($connection,$_SESSION['username']);
	$orderid = addOrder($connection,$customer->_get("id"));
	echo "Your ordered products:</br>";
	$cart = $_SESSION['cart'];
	sort($cart);
	$amountofitems=1;
	$totalprice = 0;
	for($i = 1; $i <= count($cart); $i++)
	{
		if (isset($cart[$i]))
		{
			if ($cart[$i] == $cart[$i-1])
			{
				$amountofitems++;
			}
			else
			{
				$product = getProductById($connection,$cart[$i-1]);
				$productprice = $product -> _get("price") * $amountofitems;
				$totalprice += $productprice;
				echo $product -> _get("name") . " x " . $amountofitems . " = &euro;" . $productprice . "</br>";
				addProductToOrder($connection,$product -> _get("id"),$orderid,$amountofitems);
				$amountofitems = 1;
			}
		}
		else
		{
			$product = getProductById($connection,$cart[$i-1]);
			$productprice = $product -> _get("price") * $amountofitems;
			$totalprice += $productprice;
			echo $product -> _get("name") . " x " . $amountofitems . " = &euro;" . $productprice . "</br>";
			addProductToOrder($connection,$product -> _get("id"),$orderid,$amountofitems);
		}			
	}
	echo "Total price: &euro;$totalprice </br>";
	echo "Order finished.";
}
else
{
	echo "Nothing in your cart, nothing to order.";
}
?>