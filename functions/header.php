<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<title>
			Webshop
		</title>
	</head>
	<body>
		<div id="wrap">
			<div id="bannerID">
				<a href="index.php">
						<img src="images/banner.png" width="275" height="172" alt="Banner Webshop" />
						GAMESHOP ET
				</a>
			</div>

			<nav class="navbar navbar-inverse" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<?php
							include 'repositories/menurepository.php';
							$menu = getAllUserMenus($connection);
							
							foreach($menu as &$menuitem)
							{
								$id = $menuitem -> _get("id");
								$name = $menuitem -> _get("name");
								$link = $menuitem -> _get("link");
						?>
								<li><a href="<?php echo $link?>"><?php echo $name?></a></li>
						<?php
							}
						?>
				</div>
			</nav>