<?php

// include the class
require_once($_SERVER['DOCUMENT_ROOT'].'/classes/RomanNumeralsGenerator.php');

class RomanNumeralGeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testgenerate()
    {
        // Arrange
        $a = new RomanNumeral();

    }
    
    public function testparse()
    {
        // Arrange
        $a = new RomanNumeral();
        
        $result = $a->parse('I'); 
        // test
        $this->assertEquals(1,$result);
        
        $result = $a->parse('V');
        // test
        $this->assertEquals(5,$result);
        
        $result = $a->parse('IV');
        // test
        $this->assertEquals(4,$result);
        
        $result = $a->parse('VI');
        // test
        $this->assertEquals(6,$result);
    }

}