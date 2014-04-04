
	<ul class="nav nav-pills nav-stacked">
	<?php
		include_once 'repositories/categoryrepository.php';
		
		$categories = getAllSubCategories($connection);
		
		foreach($categories as &$category)
		{
			$name = $category -> _get("name");
			$description = $category -> _get("description");
			
			?>
			<li><a href="index.php?page=products&amp;category=<?php echo $name ?>"><?php echo $name ?> </a></li>
		<?php
		}
		?>
		</ul>