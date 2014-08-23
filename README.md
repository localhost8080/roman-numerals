roman-numerals
==============

roman numeral calculator


parse function:

there are lots of examples in the php documentation and on stackoverflow;
rather than use one of those (they should be fine with testing) im going to write my own
http://php.net/manual/en/function.base-convert.php
probably better than this would be to use the PEAR or ZEND implementations, but thats outside the scope of this 
task

the general method is to populate an array with 'letter' => 'value' pairs and compare from right to left, 
summing as we go (or if the next digit is less than the current digit, subtract it from the current digit)

eg XIV becomes (rtl) VIX becomes 5-1+10 = 14
this then becomes pretty easy and is just an if / else

generate function:
the generate function


-- notes
while this task is designed to build some code from scratch with tests, etc, in a production environment its not always advisable to re-invent the wheel:
the zend framework 1 has a comprehensive library for all sorts of conversions
http://framework.zend.com/manual/1.0/en/zend.measure.types.html
this component could easilly be used on on its own or alongside zf2 within a larger application, eg using composer

there is also a PEAR library for roman numeral conversion (though the code is no longer maintained, it suports conversion of numbers up to 5,999,999)