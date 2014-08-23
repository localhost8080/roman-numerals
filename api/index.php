<?php
// really simple wrapper round out methods
include $_SERVER['DOCUMENT_ROOT'].'/classes/RomanNumeralGenerator.php';

$roman_numeral = new RomanNumeral();

// this could be simplified
// also, we dont sanitise the $_REQUEST
// though there are loads of ways to do it, but I've left is out of here to show in the basic class construct
// I wouldnt recommend this for a production machine though, as there should be a separate validation class 
// for all input methods with proper exceptions and response messages

switch($_REQUEST['method']){
	case parse:
	    $result = $roman_numeral->parse($_REQUEST['string']);
	    break;
	case generate:
	    $result = $roman_numeral->generate($_REQUEST['number']);
	    break;
}

echo json_encode($result);