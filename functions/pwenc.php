<?php
function encrypt($pw,$username)
{
	return sha1($pw . $username . "0f8s83kurkg");
}
?>