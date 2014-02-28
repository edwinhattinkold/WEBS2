<nav>
	<ul class="nav nav-pills nav-stacked">
	<?php
		include 'repositories/categoryrepository.php';
		
		$categories = getAllCategories($connection);
		
		foreach($categories as &$category)
		{
			$name = $category -> _get("name");
			$description = $category -> _get("description");
			
			?>
			<li><a href="category.php?category=<?php echo $name ?>" category="<?php echo $name ?>"><?php echo $name ?> </a>
		<?php
		}
		?>
</nav>