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

    public $data = array(
        'I' => '1',
        'V' => '5',
        'X' => '10',
    );

    /**
     *
     * @param integer $integer
     *            convert from int -> roman
     */
    public function generate($integer)
    {
    }

    /**
     *
     * @param unknown $string
     *            convert from roman -> int
     *            works by reversing the string, taking the first letter getting its value from the $data array
     *            if the current letter has a value lower than the the previous letter, then it subtracts instead of
     *            adds.
     */
    public function parse($string)
    {
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
        }
        // return the running total [the value of the string]
        return $running_total;
    }
}