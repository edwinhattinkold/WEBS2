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
				echo "<h2 class='text-center'>Your cart</h2>";
				echo "<h3>These are the items in your cart:</h3>";
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
							$amountofitems = 1;
						}
					}
					else
					{
						$product = getProductById($connection,$cart[$i-1]);
						$productprice = $product -> _get("price") * $amountofitems;
						$totalprice += $productprice;
						echo "<tr><td>" . $product -> _get("name") . "</td><td>x " . $amountofitems . "</td><td>&euro;" . $productprice . "</td></tr>";
					}			
				}
				echo "<tr><th></th><th>Total price:</th><th>&euro;$totalprice</th></tr>";
				echo "</table>";
				echo "<a href='index.php?page=finishcart' class='btn btn-primary active' role='button'>Finish order</a>";
			}
		?>
	</p>
</div>