<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
		<script src="assets/js/lib/jquery.js" type="text/javascript"></script>
		<script src="assets/js/dist/jquery.validate.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$("#registerform").validate({
				rules: {
					email:
					{
						required:true,
						email: true,
					},
				}

			});
		});
		</script>
		<title>
			Webshop
		</title>
	</head>
	<body>
		<div id="bannerID">
			<a href="index.php?page=home">
					<img src="images/banner.png" width="275" height="172" alt="Banner Webshop" />
					GAMESHOP ET
			</a>
		</div>
		
		<?php include 'functions/menu.php';?>
