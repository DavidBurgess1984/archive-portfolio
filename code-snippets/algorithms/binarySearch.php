<?php

/**
*  Demonstation of Binary search algorithm.  Iteratively splits an array using the centre index and queries if this array value
*  equals or is greater/less than the search value.  Has O(ln n) performance.
*/

function findValue($array, $searchValue){
	$min = 0;
	$max = count($array)-1;
	$guessCounter = 0;
	
	while($max >= $min){

		$guessCounter++;
		$guess = round(($min + $max) / 2);
		
		if($searchValue === $array[$guess]){
			echo 'Total number of guesses: '.$guessCounter."\n";
			return $guess;
		} elseif($array[$guess] > $searchValue){
			$max = $guess - 1;
		} else{
			$min = $guess + 1;
		}
	}
	
	return -1;
}

$testArray = [2,5,7,13,23];
$searchValue = 13;
$result = findValue($testArray,$searchValue);

if($result !== -1){
	echo "Value found at index: ".$result."\n";
}else {
	echo "Value not found\n";
}
?>