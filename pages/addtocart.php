<?php
include_once 'repositories/productrepository.php';
if (!isset($_GET['id']))
{
	echo "You entered the page incorrectly, please try again.";
}
else
{
	if (isset($_SESSION['cart']))
	{
		array_push($_SESSION['cart'],$_GET['id']);
	}
	else
	{
		$cart = array($_GET['id']);
		$_SESSION['cart'] = $cart;
	}
	echo "These are the items in your cart:</br>";
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
				$amountofitems = 1;
			}
		}
		else
		{
			$product = getProductById($connection,$cart[$i-1]);
			$productprice = $product -> _get("price") * $amountofitems;
			$totalprice += $productprice;
			echo $product -> _get("name") . " x " . $amountofitems . " = &euro;" . $productprice . "</br>";
		}			
	}
	echo "Total price: &euro;$totalprice </br>";
	echo "<a href='index.php?page=finishcart'>Finish order</a>";
}
?>