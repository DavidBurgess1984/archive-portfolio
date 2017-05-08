<?php
/**
*  Simple demonstration of factorial calculation using recursion.
* n! = n* n-1*....*1;
* 0! = 1
*/

function factorial($n) {
	// base case: 
	if($n===0){
	    return 1;   
	} else {
	    return $n* factorial($n-1);   
	}
	// recursive case:
}; 

echo "The value of 0! is " + factorial(0) + ".\n";
echo "The value of 5! is " + factorial(5) + ".\n";

?>