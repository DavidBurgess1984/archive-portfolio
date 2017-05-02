<?php

/**
* Selection Sort Algorithm
* Arrays can be sorted by swapping index i of an array $a of n elements with the index holding minimum value of $a[i+1] ..$a[n]
* The value i is increment by 1 until the last value n.
*  
* Note this has O(n^2) making in very slow for large arrays. See 
* https://www.khanacademy.org/computing/computer-science/algorithms/sorting-algorithms/a/analysis-of-selection-sort
*/

//Swap two indices in an array
function swap($array, $firstIndex, $secondIndex) {
    $temp = $array[$firstIndex];
    $array[$firstIndex] = $array[$secondIndex];
    $array[$secondIndex] = $temp;
	
	return $array;
};

//find the index of a minimum value in an array starting at $startIndex
function indexOfMinimum($array, $startIndex) {

    $minValue = $array[$startIndex];
    $minIndex = $startIndex;

    for($i = $minIndex + 1; $i < count($array); $i++) {
        if($array[$i] < $minValue) {
            $minIndex = $i;
            $minValue = $array[$i];
        }
    } 
    return $minIndex;
}; 

//selection sort algorithm
function selectionSort($array) {
    $min;
    
    for($i =0;$i<count($array);$i++){
        $min = indexOfMinimum($array,$i);
        $array = swap($array, $i,$min);
    }
	
	return $array;
};

$array = array(22, 11, 99, 88, 9, 7, 42);
$sortedArray = selectionSort($array);
echo "Array after sorting: \n ";
echo print_r($sortedArray,1);



?>