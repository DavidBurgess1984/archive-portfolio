<?php

/**
* Recursion algorithm Demonstration
*
* Demonstrates how recursion can be applied to check if a string is a palindrome ( ie is the same word when all characters are reversed).
* First and last characters are removed then the function is applied again to the middle substring.
* Eg Rotor -> oto -> t 
*/

// Returns the first character of the string str
function firstCharacter($str) {
    return substr($str,0, 1);
};

// Returns the last character of a string str
function lastCharacter($str) {
    return substr($str,0,-1);
};

// Returns the string that results from removing the first
//  and last characters from str
function middleCharacters($str) {
    return substr($str,1, -1);
};

function isPalindrome ($str) {
    if(strlen($str) === 0){
        return true;        
    } else if(strlen($str) ===1){
        return true;   
    }else if(firstCharacter($str) ===lastCharacter($str)){
        return isPalindrome(middleCharacters($str));
    } else {
        return false;   
       
    }
    // recursive case
};

function checkPalindrome($str) {
    echo "Is this word a palindrome? " . $str."\n";
    echo print_r(isPalindrome($str),1);
};

checkPalindrome("a");

checkPalindrome("motor");

checkPalindrome("rotor");
?>
