<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
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
									
									if($name == 'Products')
									{
										?>
										<li class="dropdown">
											<a href="index.php?page=<?php echo $link?>" class="dropdown-toggle"><?php echo $name ?></a>
											<ul class="dropdown-menu">
											<?php
											include_once 'repositories/categoryrepository.php';
											$categories = getAllMainCategories($connection);
											foreach($categories as &$categoryitem)
											{
												$name = $categoryitem -> _get("name");
												$description = $categoryitem -> _get("description");
												?>
												<li><a href="index.php?page=products&amp;category=<?php echo $name ?>"><?php echo $name ?> </a></li>
												<?php
											}
											?>
											</ul>
										</li>
										<?php
									}
									else
									{
										?>
										<li><a href="index.php?page=<?php echo $link?>"><?php echo $name?></a></li>
										<?php
									}
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
												<li><a href="index.php?page=<?php echo $link?>" class="btn-danger"><?php echo $name?></a></li>
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