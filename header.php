<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	<link rel="stylesheet" href="css/stijl.css" type="text/css" />
		<title>
			Webshop
		</title>
	</head>
	<body>
		<div id="bannerID">
			<a href="index.php">
					<img src="images/banner.png" width="275" height="172" alt="Banner Webshop" />
					GAMESHOP ET
			</a>
		</div>
		<div id="menu">
		<table>
		<tr>
		<?php
			include 'repositories/menurepository.php';
			$menu = getAllMenus($connection);
			
			foreach($menu as &$menuitem)
			{
				$id = $menuitem -> _get("id");
				$name = $menuitem -> _get("name");
				$link = $menuitem -> _get("link");
				echo "<td><b><a href=\"$link\">";
				echo $name;
				echo "</a>";
				echo "</b></td>";
			}
			
			
		?>
		</tr>
		</table>
		</div>