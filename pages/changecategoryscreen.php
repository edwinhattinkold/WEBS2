<?php
if(isset($_GET['name']))
{
	echo " >> " . $_GET['name'];
}
?>
<div class="container">
	<?php
	include_once 'functions/checklogin.php';
	checkLogin($connection,"admin");
	include_once 'repositories/categoryrepository.php';
	
	if(!isset($_GET['name']))
	{
		echo "You entered the page incorrectly, pleasy try again";
	}
	else
	{
		$category = getCategoryByName($connection,$_GET['name']);
		$name = $category->_get("name");
		$categorytype_name = $category->_get("categorytype_name");
		
		if(!isset($name))
		{
			echo "This category doesn't exist.";
		}
		else
		{
			$name = $category->_get("name");
			$categorytype_name = $category->_get("categorytype_name");
			
	?>
			<form enctype="multipart/form-data" action="index.php?page=categorychange" method="POST">
				Category name: <input type="text" name="name" value="<?php echo $name ?>"/><br/>
				<input type="hidden" name="oldname" value="<?php echo $name ?>"/>
				Category type: <select name="type">
					<option value="<?php echo $categorytype_name ?>"><?php echo $categorytype_name ?></option>
					<?php
					if($categorytype_name == "maincategory")
					{
						echo "<option value='subcategory'>subcategory</option>";
					}
					else
					{
						echo "<option value='maincategory'>maincategory</option>";
					}
					?>
					
				</select><br/>
				<input type="submit" name="send" value="Change Category"/>
			</form>
	<?php
		}
	}
	?>
</div>