<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
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

		<div class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					</button>
				</div>
				<div class="container">
					<div class="collapse navbar-collapse">
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
									<li><a href="index.php?page=<?php echo $link?>"><?php echo $name?></a></li>
									<?php
								}
								if (isset($_SESSION["username"]))
								{
									include_once 'repositories/userrepository.php';
									$user = getUserByName($connection,$_SESSION["username"]);
									if($user->_get("rights_right") == "admin")
									{	
										$menu = getAllAdminMenus($connection);
										foreach($menu as &$menuitem)
										{
											$id = $menuitem -> _get("id");
											$name = $menuitem -> _get("name");
											$link = $menuitem -> _get("link");
											?>
											<li><a href="index.php?page=<?php echo $link?>"><?php echo $name?></a></li>
											<?php
										}
									}
									?>
									<li><a href="index.php?page=logout">Logout</a></li>
									<?php
								}
								else
								{
									?>
									<li><a href="index.php?page=login">Login</a></li>
									<?php
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>