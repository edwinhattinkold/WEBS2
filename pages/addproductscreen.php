<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php 
include_once 'functions/checklogin.php';
checkLogin($connection,"admin");
include_once 'repositories/categoryrepository.php';
?>
<div class="container">
	<form enctype="multipart/form-data" action="index.php?page=addproduct" method="POST">
		Product name: <input type="text" name="name"/><br/>
		Category: <select name="category">
			<option value="">Select...</option>
			<?php
				$categories = getAllMainCategories($connection);
			
				foreach($categories as &$category)
				{
					$name = $category -> _get("name");
					echo "<option value=\"$name\">$name</option>";
				}
				?>
		</select><br/>
		Subcategory: <select name="subcategory">
			<option value="">Select...</option>
			<?php
				$categories = getAllSubCategories($connection);
			
				foreach($categories as &$category)
				{
					$name = $category -> _get("name");
					echo "<option value=\"$name\">$name</option>";
				}
				?>
		</select><br/>
		Description: <textarea name="description"/></textarea><br/>
		Short description: <textarea name="short_description"/></textarea><br/>
		Price: <input type="number" name="price"/><br/>
		Image: <input type="file" name="file" id="file"/><br/>
		<input type="submit" name="send" value="Add Product"/>
	</form>	
</div>