</div></br></br>
<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
	<p>
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
				echo "<h2 class='text-center'>Your cart</h2>";
				echo "<h3>These are your ordered products:</h3>";
				echo "<table class='table'>";
				echo "<tr><th>Product:</th><th>Amount of product:</th><th>Price:</th></tr>";
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
							echo "<tr><td>" . $product -> _get("name") . "</td><td>x " . $amountofitems . "</td><td>&euro;" . $productprice . "</td></tr>";
							addProductToOrder($connection,$product -> _get("id"),$orderid,$amountofitems);
							$amountofitems = 1;
						}
					}
					else
					{
						$product = getProductById($connection,$cart[$i-1]);
						$productprice = $product -> _get("price") * $amountofitems;
						$totalprice += $productprice;
						echo "<tr><td>" . $product -> _get("name") . "</td><td>x " . $amountofitems . "</td><td>&euro;" . $productprice . "</td></tr>";
						addProductToOrder($connection,$product -> _get("id"),$orderid,$amountofitems);
					}			
				}
				echo "<tr><th></th><th>Total price:</th><th>&euro;$totalprice</th></tr>";
				echo "</table>";
				echo "<h4>Order finished</h4></br>";
				echo "<a href='index.php?page=home' class='btn btn-primary btn-xs active' role='button'>home</a>";
			}
			else
			{
				echo "Nothing in your cart, nothing to order.";
			}
		?>
	</p>
</div>