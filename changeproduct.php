<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php';
include 'repositories/categoryrepository.php';
include 'repositories/productrepository.php';
if (!isset($_GET['productid']))
{
	echo "You entered the page incorrectly, please try again";
}
else
{
	$product = getProductById($connection,$_GET['productid']);
	$id = $product -> _get("id");
	$name = $product -> _get("name");
	$description = $product -> _get("description");
	$price = $product -> _get("price");
	$image = $product -> _get("image");
	$category_name = $product -> _get("category_name");
	if (!isset($id))
	{
		echo "This product doesn't exist.";
	}
	else
	{
		$id = $product -> _get("id");
		$name = $product -> _get("name");
		$description = $product -> _get("description");
		$price = $product -> _get("price");
		$image = $product -> _get("image");
		$category_name = $product -> _get("category_name");
?>
		<div class="row">
			<form enctype="multipart/form-data" action="updateproduct.php" method="POST">
				Product number: <?php echo $id ?><input type="hidden" name="id" value="<?php echo $id ?>"><br/>
				Product name: <input type="text" name="name" value="<?php echo $name ?>"/><br/>
				<select name="category">
					<option value="<?php echo $category_name?>"><?php echo $category_name?></option>
					<?php
						$categories = getAllCategories($connection);
					
						foreach($categories as &$category)
						{
							$cname = $category -> _get("name");
							if ($cname != $category_name)
							{
								echo "<option value=\"$cname\">$cname</option>";
							}
						}
						?>
				</select><br/>
				Description: <textarea name="description"/><?php echo $description?></textarea><br/>
				Price: <input type="number" name="price" value="<?php echo $price ?>"/><br/>
				Current image: <img src="<?php echo $image ?>" height="300" width ="200" alt="<?php echo $name ?>"/><br/>
				Image: <input type="file" name="file" id="file"/><br/>
				<input type="hidden" name="hiddenimage" value="<?php echo $image ?>"/>
				<input type="submit" name="send" value="Change product"/>
			</form>
		</div>			
<?php
	}
}
 include 'functions/footer.php'; ?>