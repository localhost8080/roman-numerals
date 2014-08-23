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
        
        $result = $a->generate(10);
        // test
        $this->assertEquals('X',$result);
        
        $result = $a->generate(50);
        // test
        $this->assertEquals('L',$result);
        
        $result = $a->generate(100);
        // test
        $this->assertEquals('C',$result);
        
        $result = $a->generate(500);
        // test
        $this->assertEquals('D',$result);
        
        $result = $a->generate(1000);
        // test
        $this->assertEquals('M',$result);
        
        // trickier ones
        
        $result = $a->generate(4);
        // test
        $this->assertEquals('IV',$result);
        
        $result = $a->generate(9);
        // test
        $this->assertEquals('IX',$result);
        
        $result = $a->generate(90);
        // test
        $this->assertEquals('XC',$result);

        $result = $a->generate(400);
        // test
        $this->assertEquals('CD',$result);
        
        $result = $a->generate(900);
        // test
        $this->assertEquals('CM',$result);
        
        $result = $a->generate(999);
        // test
        $this->assertEquals('CMXCIX',$result);        
        
        $result = $a->generate(2014);
        // test
        $this->assertEquals('MMXIV',$result);
        
        // what happens when we pass an incorrect data type
        $result = $a->generate('string');
        // test
        $this->assertFalse($result);
        
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
        
        // what if we pass an incorect data type
        
        $result = $a->parse(1000);
        // test
        $this->assertFalse($result);
        
        
    }

}