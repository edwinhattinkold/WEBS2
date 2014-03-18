<?php
function addImage($filename,$tempname)
{
	$allowedExts = array("gif", "jpeg", "jpg", "png", "PNG","GIF","JPEG","JPG");
	$temp = explode(".", $filename);
	$extension = end($temp);
	if (in_array($extension,$allowedExts))
	{
		if (file_exists("images/" . $filename))
		{
			echo $filename . " already exists. ";
		}
		else
		{
			move_uploaded_file($tempname,"images/" . $filename);
		}
		return "images/".$filename;
	}
	else
	{
		echo "The file you uploaded is wrong."; 
	}
}
?>