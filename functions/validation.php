<?php
function filterEmail($input)
{
	return filter_var($input,FILTER_VALIDATE_EMAIL);
}

function filterInt($input)
{
	return is_int($input);
}
?>