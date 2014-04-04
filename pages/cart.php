</div><br /><br />
<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
<?php
include_once 'repositories/productrepository.php';
if (isset($_SESSION['cart']))
{
	echo "<h2 class='text-center'>Your cart</h2>";
	echo "<h3>These are the items in your cart:</h3>";
	echo "<table class='table'>";
	echo "<tr><th>Product:</th><th>Amount of product:</th><th>Price:</th><th></th></tr>";
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
				echo "<tr><td>" . $product -> _get("name") . "</td><td>x " . $amountofitems . "</td><td>&euro;" . $productprice . "</td><td><a href='index.php?page=deletefromcart&amp;id=$id'>Delete 1 item from cart</td></tr>";
				$amountofitems = 1;
			}
		}
		else
		{
			$product = getProductById($connection,$cart[$i-1]);
			$id = $product->_get("id");
			$productprice = $product -> _get("price") * $amountofitems;
			$totalprice += $productprice;
			echo "<tr><td>" . $product -> _get("name") . "</td><td>x " . $amountofitems . "</td><td>&euro;" . $productprice . "</td><td><a href='index.php?page=deletefromcart&amp;id=$id'>Delete from cart</td></tr>";
		}			
	}
	echo "<tr><th></th><th>Total price:</th><th>&euro;$totalprice</th><th></th></tr>";
	echo "</table>";
	echo "<a href='index.php?page=finishcart' class='btn btn-primary active' role='button'>Finish order</a>";
}
else
{
	echo "Nothing in your cart, nothing to order.";
}
?>
</div>