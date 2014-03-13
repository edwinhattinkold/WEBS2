<?php 
include_once 'repositories/categoryrepository.php';
?>
<div class="row">
	<form enctype="multipart/form-data" action="index.php?page=addproduct" method="POST">
		Product name: <input type="text" name="name"/><br/>
		<select name="category">
			<option value="">Select...</option>
			<?php
				$categories = getAllCategories($connection);
			
				foreach($categories as &$category)
				{
					$name = $category -> _get("name");
					echo "<option value=\"$name\">$name</option>";
				}
				?>
		</select><br/>
		Description: <textarea name="description"/></textarea><br/>
		Price: <input type="number" name="price"/><br/>
		Image: <input type="file" name="file" id="file"/><br/>
		<input type="submit" name="send" value="Add Product"/>
	</form>
		
</div>