</div>
<?php
	include_once 'functions/checklogin.php';
	checkLogin($connection,"admin");
	include_once 'repositories/categoryrepository.php';
?>
<div class="container">
	<form enctype="multipart/form-data" action="index.php?page=addcategory" method="POST">
		Category name: <input type="text" name="name"/><br/>
		Category type: <select name="type">
			<option value="maincategory">maincategory</option>
			<option value="subcategory">subcategory</option>
		</select><br/>
		<input type="submit" name="send" value="Add Category"/>
	</form>
</div>