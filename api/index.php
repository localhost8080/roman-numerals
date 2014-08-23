<?php
// really simple wrapper round out methods
include $_SERVER['DOCUMENT_ROOT'].'/classes/RomanNumeralGenerator.php';

$roman_numeral = new RomanNumeral();

switch($_REQUEST['method']){
	case parse:
	    $result = $roman_numeral->parse($_REQUEST['number']);
	    break;
	case generate:
	    $result = $roman_numeral->generate($_REQUEST['number']);
	    break;
}

return json_encode($result);