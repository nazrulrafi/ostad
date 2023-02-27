<?php 
//3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.
$fruits=["apple","banana","cherry","Damson"];
function removeFirstAndLast($arr){
    array_pop($arr);
    array_shift($arr);
    return $arr;
}
$newArr=removeFirstAndLast($fruits);
print_r($newArr);