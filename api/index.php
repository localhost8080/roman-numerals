<?php
// really simple wrapper round out methods
include $_SERVER['DOCUMENT_ROOT'].'/classes/RomanNumeralGenerator.php';

$roman_numeral = new RomanNumeral();

print_r($POST);

switch($_POST['method']){
	case parse:
	    $roman_numeral->parse();
	    break;
	case generate:
	    $roman_numeral->generate();
	    break;
}