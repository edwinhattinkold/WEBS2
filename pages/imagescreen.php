</div><br/><br/>
<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="text-center">
<?php 

if (!isset($_GET['image']))
{
	echo "You entered the page incorrectly, please try again";
}
else
{
	$image = $_GET["image"];
	echo "<img src='$image' alt='$image'/>";
}
?>
</div>