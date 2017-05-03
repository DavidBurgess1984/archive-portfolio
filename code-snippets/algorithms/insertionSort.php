<?php
/**
* Insertion Sort algorithm demonstration
* With each element $a[$k], iterate over subarray from $a[0] to...$a[k-1] and compare $v.  
* See https://www.khanacademy.org/computing/computer-science/algorithms/insertion-sort/a/insertion-sort for good explanation
* Performs at O(n^2), so not efficient for large arrays
*/
function insert($array, $rightIndex, $value) {
    for($j = $rightIndex; $j >= 0 && $array[$j] > $value; $j--) {
        $array[$j + 1] = $array[$j];
    }   
    $array[$j + 1] = $value; 
	
	return $array;
};

function insertionSort($array) {
    for($i =1;$i<count($array);$i++){
        $array = insert($array,$i-1,$array[$i]);   
    }
	
	return $array;
};

$array = array(22, 11, 99, 88, 9, 7, 42);
$array = insertionSort($array);
echo "Array after sorting:  \n". print_r($array,1);

?>