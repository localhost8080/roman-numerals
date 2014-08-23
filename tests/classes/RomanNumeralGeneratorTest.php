<?php
// normally we would have an autoloader
include_once('../../classes/RomanNumeralGenerator.php');


class RomanNumeralTest extends PHPUnit_Framework_TestCase
{
    public function testgenerate()
    {
        // Arrange
        $a = new RomanNumeral();
        
        // some tests, by far these are not great
        
        $result = $a->generate(1);
        // test
        $this->assertEquals('I',$result);

        $result = $a->generate(2);
        // test
        $this->assertEquals('II',$result);
        
        $result = $a->generate(3);
        // test
        $this->assertEquals('III',$result);
        
        $result = $a->generate(5);
        // test
        $this->assertEquals('V',$result);
        
    }
    
    public function testparse()
    {
        // Arrange
        $a = new RomanNumeral();
        
        
        // some tests, by far these are not great
        
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

        $result = $a->parse('X');
        // test
        $this->assertEquals(10,$result);
        
        $result = $a->parse('IX');
        // test
        $this->assertEquals(9,$result);
        
        $result = $a->parse('XI');
        // test
        $this->assertEquals(11,$result);
        
        $result = $a->parse('XX');
        // test
        $this->assertEquals(20,$result);
        
        $result = $a->parse('XIX');
        // test
        $this->assertEquals(19,$result);

        $result = $a->parse('MMXIV');
        // test
        $this->assertEquals(2014,$result);
        
        
    }

}