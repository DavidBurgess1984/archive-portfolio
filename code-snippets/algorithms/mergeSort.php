<?php

/**
* Demonstration of Merge Sort algorithm
* iterates through 2 sorted subarrays, compares at the current key selecting the lowest value.  Increments the key for that array by 1
* Once a subarray has been traversed, the remaining content of the other array is joined to the merged array.
* (By default these are the remaining largest values already sorted into ascending order)
*/
// Takes in an array that has two sorted subarrays,
//  from [p..q] and [q+1..r], and merges the array
function merge($array, $p, $q, $r) {
    $lowHalf = [];
    $highHalf = [];

    $k = $p;
    $i;
    $j;
    for ($i = 0; $k <= $q; $i++, $k++) {
        $lowHalf[$i] = $array[$k];
    }
    for ($j = 0; $k <= $r; $j++, $k++) {
        $highHalf[$j] = $array[$k];
    }

    $k = $p;
    $i = 0;
    $j = 0;
    
    while($i < count($lowHalf) && $j< count($highHalf)){
        if($lowHalf[$i] < $highHalf[$j]){
            $array[$k++] =  $lowHalf[$i++];  
        } else {
            $array[$k++] =  $highHalf[$j++];
        }
    }
    
    while($i < count($lowHalf)){
        $array[$k++] = $lowHalf[$i++];
    }
    
    while($j < count($highHalf)){
        $array[$k++] = $highHalf[$j++];
    }
    
    return $array;
};


$array = [0,3, 7, 12, 14, -9,2, 6, 9, 11];

$array = merge($array, 0,
    floor((0 + count($array)-1) / 2),
    count($array)-1);
echo "Array after merging: \n"; 
var_dump($array);

?>