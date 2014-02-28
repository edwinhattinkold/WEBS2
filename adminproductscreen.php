<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php';
include 'repositories/categoryrepository.php';
?>
	<div class="row">
		<form enctype="multipart/form-data" action="addproduct.php" method="POST">
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
			Description: <input type="text" name="description"/><br/>
			Price: <input type="text" name="price"/><br/>
			Image: <input type="file" name="file" id="file"/><br/>
			<input type="submit" name="send" value="Add Product"/>
		</form>
			
	</div>
<?php include 'functions/footer.php'; ?>