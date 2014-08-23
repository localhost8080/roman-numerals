<?php
// really simple wrapper round out methods
include $_SERVER['DOCUMENT_ROOT'].'/classes/RomanNumeralGenerator.php';

$roman_numeral = new RomanNumeral();

// this could be simplified
// also, we dont sanitise the $_REQUEST
// though there are loads of ways to do it

switch($_REQUEST['method']){
	case parse:
	    $result = $roman_numeral->parse((string) $_REQUEST['string']);
	    break;
	case generate:
	    $result = $roman_numeral->generate((int) $_REQUEST['number']);
	    break;
}

echo json_encode($result);