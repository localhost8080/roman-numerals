<?php


/**
 * 
 * @author localhost8080
 * 
 * interface for our class file
 * usually this would be in its own file
 */
interface RomanNumeralGenerator
{
    public function generate($integer); // convert from int -> roman
    public function parse($string); // convert from roman -> int
}

class RomanNumeral implements RomanNumeralGenerator {
    
    /**
     *
     * @param integer $integer
     * 
     * convert from int -> roman
     */
    public function generate($integer){
    	
    } 
    
    /**
     * 
     * @param unknown $string
     * 
     * convert from roman -> int
     */
    public function parse($string){
    	
    } 
}