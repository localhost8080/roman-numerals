*roman-numerals convertor
_________________
by Jonathan Mitchell.

to run:
php 5.4 or 5.5 (though doesnt use namespaces, so should work on 5.3)
navigate to [vhost]/index.php

enter numbers or strings

api available at:
vhost/api/index.php

takes post or request inputs:

parameter|value
---------|--------
method|parse or generate
if method=parse|number = value
if method=generate|string = value



***parse function:
converts a roman number to an int

there are lots of examples in the php documentation and on stackoverflow;
rather than use one of those (they should be fine with testing) im going to write my own
http://php.net/manual/en/function.base-convert.php
probably better than this would be to use the PEAR or ZEND implementations, but thats outside the scope of this 
task

the general method is to populate an array with 'letter' => 'value' pairs and compare from right to left, 
summing as we go (or if the next digit is less than the current digit, subtract it from the current digit)

eg XIV becomes (rtl) VIX becomes 5-1+10 = 14
this then becomes pretty easy and is just an if / else

*** generate function:
generates a roman number from an int
max value is 3999 (though in the function this can be changed with an input parameter)

basic working is:
take a value from an array (with an associated letter)
see how many times the input number can be divided by the reference number
pop those values onto a stack
add the remainder to a variable and loop through till there is no remainder left

then loop through the stack, building our number

final step is to str_replace IIII with IV, VIV with IX, etc
[another way for larger numbers would be to loop through all the keys in the array who have '4' of a character and shift things round before creating out number]
for speed, I went with the str_replace, though I wouldnt necessarily do this in a production environment

*** Other functions
I added in a couple of helper functions:
one to validate the roman numeral contains only MCDLXV or I characters
one to validate that the int is < max val (default 3999) and is infact an int

*** Notes
code includes try / catch loops with exception handling
while loops
foreach loops
arrays
variables
switch statements
oo things (eg data available within the scope of the class, though doesnt have any private methods etc)

I have included some phpunit tests (though they arent extensive, but demonstrate a few tests for each of the methods in the class implementation, including testing for expected exceptions)

builds / tests were performed on travis-ci
[url in here]
using php-unit and tested with phpcs using a modified version of the wordpress coding standard (though the project doesnt use wordpress itsself)

version control system used was git (on github)

initial development and testing was performed on a centos 6 virtualbox with php 5.4 and apache and phpunit

the build process is as follows:
code edited in eclipse on a mac
commits made to github
travis-ci polls github for new commits and pulls 'head' revision on changes
travis-ci performs build and unit-tests

simultaneously the centos 6 vitrualbox polls the github and downloads the new code

mesasges are sent to 'slack' which notifies the dev when the build process in travis is complete (and if its good or bad)
messages are sent to 'slack' which notifies the dev when a new commit has been pulled to the development box

There is an api (very basic, without proper validation, other than the built-in validation in the php class) that accesses the generate and parse methods of the class (returns data in json format)
the api is used in the frontend as inputs are entered the data is queried and returned via a jquery ajax call and displayed in a results box
I made one form for each of the two parse and generate methods


there is no roman number for 0
while this task is designed to build some code from scratch with tests, etc, in a production environment its not always advisable to re-invent the wheel:
the zend framework 1 has a comprehensive library for all sorts of conversions
http://framework.zend.com/manual/1.0/en/zend.measure.types.html
this component could easilly be used on on its own or alongside zf2 within a larger application, eg using composer

there is also a PEAR library for roman numeral conversion (though the code is no longer maintained, it suports conversion of numbers up to 5,999,999)
