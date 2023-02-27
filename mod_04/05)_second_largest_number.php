<?php 
//5.Write a PHP function to find the second largest number in an array of numbers.
$numArr=[10,5,80,32,12,3,-10,-5,-4,102,-30];
function largestNum($num){
    $max = $num[0];
    $smax=0;
    for($i=1; $i<count($num); $i++){
        if($num[$i]>$max){
            $smax = $max;
            $max = $num[$i];
        }else if($smax<$num[$i] && $smax < $max){
            $smax = $num[$i];
        }
    }
    echo $smax;
}
largestNum($numArr);