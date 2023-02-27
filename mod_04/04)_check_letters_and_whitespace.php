<?php
/*4.Write a PHP function to check if a string contains only letters and whitespace.*/

function containsOnlyLettersAndWhitespace( $str )  {
	if ( preg_match('/^[a-zA-Z\s]+$/',$str) ) {
		echo "This string has only Letter or Space";
	}
	else {
		echo "The string contains other characters besides letters and whitespace.";
	}
}
$string = "";

containsOnlyLettersAndWhitespace( $string);