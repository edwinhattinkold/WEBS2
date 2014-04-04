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
include_once 'repositories/categoryrepository.php';
include_once 'repositories/productrepository.php';
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
		$category = $product -> _get("category");
		$subcategory = $product -> _get("subcategory");
		$short_description = $product -> _get("short_description");
?>
			<form enctype="multipart/form-data" action="index.php?page=changeproduct" method="POST">
				Product number: <?php echo $id ?><input type="hidden" name="id" value="<?php echo $id ?>"><br/>
				Product name: <input type="text" name="name" value="<?php echo $name ?>"/><br/>
				Category: <select name="category">
					<option value="<?php echo $category?>"><?php echo $category?></option>
					<?php
						$categories = getAllMainCategories($connection);
					
						foreach($categories as &$mcategory)
						{
							$cname = $mcategory -> _get("name");
							if ($cname != $category)
							{
								echo "<option value=\"$cname\">$cname</option>";
							}
						}
						?>
				</select><br/>
				Subcategory: <select name="subcategory">
					<option value="<?php echo $subcategory?>"><?php echo $subcategory?></option>
					<?php
						$categories = getAllSubCategories($connection);
					
						foreach($categories as &$scategory)
						{
							$cname = $scategory -> _get("name");
							if ($cname != $subcategory)
							{
								echo "<option value=\"$cname\">$cname</option>";
							}
						}
						?>
				</select><br/>
				Description: <textarea name="description"/><?php echo $description?></textarea><br/>
				Short description: <textarea name="short_description"/><?php echo $short_description?></textarea><br/>
				Price: <input type="number" name="price" value="<?php echo $price ?>"/><br/>
				Current image: <img src="<?php echo $image ?>" height="300" width ="200" alt="<?php echo $name ?>"/><br/>
				Image: <input type="file" name="file" id="file"/><br/>
				<input type="hidden" name="hiddenimage" value="<?php echo $image ?>"/>
				<input type="submit" name="send" value="Change product"/>
			</form>		
<?php
	}
}
?>
</div>