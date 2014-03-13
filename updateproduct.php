<?php 
include 'db/connection.php';
$connection = openDB();
include 'functions/header.php';
?>
	<div class="row">
		<?php
			include 'functions/printproduct.php';		
			$product = new Product();
			$product -> _set("id",$_POST["id"]);
			$product -> _set("name",$_POST["name"]);
			$product -> _set("description",$_POST["description"]);
			$product -> _set("price",$_POST["price"]);
			$product -> _set("category_name",$_POST["category"]);
			if (isset($_POST["file"]))
			{
				if ($_FILES["file"]["error"] > 0)
				{
					echo "Error: " . $_FILES["file"]["error"] . "<br/>";
					$product -> _set("image",$_POST["hiddenimage"]);
				}
				else
				{
					$allowedExts = array("gif", "jpeg", "jpg", "png", "PNG","GIF","JPEG","JPG");
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
					}
					else
					{
						echo "The file you uploaded is wrong, we keep the old image."; 
						$product -> _set("image",$_POST["hiddenimage"]);
					}
				}
			}
			else
			{
				$product -> _set("image",$_POST["hiddenimage"]);
			}
			updateProduct($connection,$product);
			printproduct($connection,$product -> _get("id"));
		?>		
	</div>
<?php include 'functions/footer.php'; ?>