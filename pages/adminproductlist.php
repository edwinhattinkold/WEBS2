<div class="container">
<?php
include_once 'functions/checklogin.php';
checkLogin($connection,"admin");
include_once 'functions/printproduct.php';
printadminproducts($connection);
?>
</div>