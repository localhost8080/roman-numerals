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

class RomanNumeral implements RomanNumeralGenerator
{

    /**
     * a wee array of roman numerals and their corresponding values
     * gets values from the table here: http://en.wikipedia.org/wiki/Roman_numeral
     */
    public $data = array(
        'I' => '1',
        'V' => '5',
        'X' => '10',
        'L' => '50',
        'C' => '100',
        'D' => '500',
        'M' => '1000',
    );

    /**
     *
     * @param integer $integer
     *            convert from int -> roman
     */
    public function generate($integer)
    {
        // check if its an int and its <= 3999, or if not an integer, then return false
        if (! is_int($integer) || (is_int($integer) && $integer > 3999 ) ) {
            return false;
        }
        
        // we need some stacks
        // counter - keep track of the count of each letter we have
        $counter = array();
        // keep whats left from our integer
        $remainder = $integer;
        // we need to go through our data array from largest to smallest, so we should copy it and flip it
        $flipped_data = array_reverse($this->data);
        foreach ($flipped_data as $key => $value) {
            // check if the remainder is more than the current value of the letter
            if ($remainder >= $flipped_data[$key]) {
                // dont really need to do this, but makes it easier to see the calculation
                $x = $remainder;
                $y = $flipped_data[$key];
                // number of times its divisible
                // integer minus the remainder divided by the value of the coin
                // remainder is x mod y
                $z = ($x - ($x % $y)) / $y;
                // set the remainder
                $remainder = $x % $y;
                // push it into the counter array
                $counter[$key] = $z;
            }
        }
        // set our result to blank
        $result = '';
        // there is probably a much simpler way to do this
        // go through our array and flatten it out
        foreach ($counter as $key => $count) {
            // spit them out the number of times they are in the array
            while ($count > 0) {
                $result .= $key;
                $count --;
            }
        }
        // this doesnt work for IV or IX or CM, but that can be fixed
        // really stupid way for now:
        $result = str_replace('IIII', 'IV', $result);
        $result = str_replace('VIV', 'IX', $result);
        $result = str_replace('LXXXX', 'XC', $result);
        $result = str_replace('CCCC', 'CD', $result);
        $result = str_replace('DCD', 'CM', $result);
        return $result;
    }

    /**
     *
     * @param string $string
     *            convert from roman -> int
     *            works by reversing the string, taking the first letter getting its value from the $data array
     *            if the current letter has a value lower than the the previous letter, then it subtracts instead of
     *            adds.
     *            
     *            this function doesnt check to see if we have a valid roman nummeral, that should be in a validate
     *            function
     *            -- ill add one in if I have time
     */
    public function parse($string)
    {
        // check if its an int, if not, return false
        if (! is_string($string)) {
            return false;
        }
        // setup our running total to 0
        $running_total = 0;
        // reverse the $string -- note that this function is not multibyte safe,
        // but MCXVI and 0-9 are not multibyte characters...
        // on first run we need to set the 'previous value' to be 0
        $previous_value = 0;
        $string = strrev($string);
        // drop the characters from the string into an array -- this allows us to foreach
        // the array $letters will have the roman letter as the value in the k/v/ pair
        $letters = str_split($string);
        // loop through each letter
        foreach ($letters as $key => $value) {
            // there are a few ways to do this now:
            // we could merge the arrays and sum all the parts
            // we could take each index one at a time and sum them
            // one thing we have to do - if the current number is
            // less than the previous number then we have to subtract it from the running total
            // this is the actual number that the letter corresponds to
            $current_value = $this->data[$value];
            // check if the current_vale is less than the previous one..
            if ($current_value < $previous_value) {
                // if this value is less than the previous one, subtract
                $running_total = $running_total - $current_value;
            } else {
                $running_total = $running_total + $current_value;
            }
            // set the previous value, so we can check it next time round the loop
            $previous_value = $current_value;
            // wrong place really to check, but see if its > 3999 and return if its over this
            if ($running_total > 3999) {
                return false;
            }
        }
        // return the running total [the value of the string]
        return $running_total;
    }
}