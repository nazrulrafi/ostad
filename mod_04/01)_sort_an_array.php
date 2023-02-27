<?php 
//1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)
function sortStringsByLength( array $strings ) {
    usort( $strings, function ( $a, $b ) {
        return strlen( $a ) - strlen( $b );
    } );

    return $strings;
}

$strings = array( "apple", "banana", "cherry", "date", "elderberry" );
$sorted  = sortStringsByLength( $strings );
print_r( $sorted );