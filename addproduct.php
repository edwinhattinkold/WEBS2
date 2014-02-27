<?php 
include 'db/connection.php';
$connection = openDB();
include 'header.php'; 
?>
	<div class="row">
		<?php
			echo "Product name: " . $_POST["name"] . "<br/>";
			echo "Category: " . $_POST["category"] . "<br/>";
			echo "Description: " . $_POST ["description"] . "<br/>";
			echo "Price: " . $_POST ["price"] . "<br/>";
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Error: " . $_FILES["file"]["error"] . "<br/>";
			}
			else
			{				
				if (file_exists("images/" . $_FILES["file"]["name"]))
				{
					echo $_FILES["file"]["name"] . " already exists. ";
				}
				else
				{
					move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"]);
					echo "Stored in: " . "images/" . $_FILES["file"]["name"];
				}
			}
			
			include 'repositories/productrepository.php';			
			$product = new Product();
			
			$product -> _set("name",$_POST["name"]);
			$product -> _set("description",$_POST["description"]);
			$product -> _set("price",$_POST["price"]);
			$product -> _set("image","images/".$_FILES["file"]["name"]);
			$product -> _set("category_name",$_POST["category"]);
			
			addProduct($connection,$product);
		?>		
	</div>
<?php include 'footer.php'; ?>