<?php
//2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.
function concatenate($str1,$str2){
	$str = $str1.$str2;
	return $str;
}
echo concatenate('Hello','World');