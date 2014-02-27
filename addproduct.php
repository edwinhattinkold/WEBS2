<?php 
include 'db/connection.php';
$connection = openDB();
include 'header.php'; 
?>
	<div class="row">
		<?php
			include 'repositories/productrepository.php';			
			$product = new Product();
			echo "Product name: " . $_POST["name"] . "<br/>";
			echo "Category: " . $_POST["category"] . "<br/>";
			echo "Description: " . $_POST ["description"] . "<br/>";
			echo "Price: " . $_POST ["price"] . "<br/>";
			$product -> _set("name",$_POST["name"]);
			$product -> _set("description",$_POST["description"]);
			$product -> _set("price",$_POST["price"]);
			$product -> _set("category_name",$_POST["category"]);
			
			if ($_FILES["file"]["error"] > 0)
			{
				echo "Error: " . $_FILES["file"]["error"] . "<br/>";
			}
			else
			{
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
				if (in_array($extension,$allowedExts))
				{
					if (file_exists("images/" . $_FILES["file"]["name"]))
					{
						echo $_FILES["file"]["name"] . " already exists. ";
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $_FILES["file"]["name"]);
					}
					$product -> _set("image","images/".$_FILES["file"]["name"]);
					echo "Uploaded image: <img src=\"images/".$_FILES["file"]["name"]."\" alt=\"Uploaded image\"/>";
				}
				else
				{
					echo "The file you uploaded is wrong."; 
				}
			}			
			addProduct($connection,$product);
		?>		
	</div>
<?php include 'footer.php'; ?>