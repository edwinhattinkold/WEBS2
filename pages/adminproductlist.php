<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<div class="container">
<?php
include_once 'functions/checklogin.php';
checkLogin($connection,"admin");
include_once 'functions/printproduct.php';
printadminproducts($connection);
?>
</div>