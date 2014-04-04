<?php
/*
Edwin Hattink 	2063703
Thim Heider		2066993
42IN07SOl
*/
?>
<?php
function encrypt($pw,$username)
{
	return sha1($pw . $username . "0f8s83kurkg");
}
?>