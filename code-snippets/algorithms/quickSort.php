<?php

//***********Quick Sort demonstration******************//
//$pivot value is defined at last entry of array
function swap(&$array, $firstIndex,$secondIndex){
	$temp = $array[$firstIndex];
	$array[$firstIndex] = $array[$secondIndex];
	$array[$secondIndex] = $temp;
}

function partition(&$array,$p,$r){
	$q = $p;
	
	for($j = $p; $j < $r;$j++){
		if($array[$j] <= $array[$r]){
			swap($array,$j,$q);
			$q++;
		}
	}
	
	swap($array, $r,$q);
	
	return $q;
}

function quickSort(&$array,$p,$r){
	if($p < $r){
		$pivot = partition($array,$p,$r);
		quickSort($array,$p,$pivot-1);
		quickSort($array,$pivot+1,$r);
	}

}

$array = [4,19,5,6,3];
quickSort($array,0,4);
var_dump($array);

?>