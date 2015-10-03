<?php

$array = array(1231234,10,200,20,15,5,6,3,23,123);

echo " max value " . getMaxValue($array);

function getMaxValue($array) {
    $max = $array[0];
    for($i=1; $i<count($array); $i++) {
        if($max < $array[$i]) {
            $max = $array[$i];
        }
    }
    return $max;
}









