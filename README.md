# Roman-numerals convertor

by Jonathan Mitchell.

Jump to:
 - [Install](#install)
 - [Api](#api)
 - [Code Explanation](#code)
 - [Build Process Explanation](#build-process)
 - [Notes](#notes)

[![Build Status](https://travis-ci.org/localhost8080/roman-numerals.svg?branch=master)](https://travis-ci.org/localhost8080/roman-numerals)

##Install:
php 5.4 or 5.5 (though doesnt use namespaces, so should work on 5.3)
A web server apable of running php (apache, lighthttpd, nginx, etc)

    git clone https://github.com/localhost8080/roman-numerals.git

into a vhost
navigate to [vhost] in your preferred browser.

-----------

## Api

There is an api (very basic, without proper validation, other than the built-in validation in the php class).
The Api accesses the generate and parse methods of the class (returns data in json format). The api is used in the frontend as inputs are entered the data is queried and returned via a jquery ajax call and displayed in a results box.
I made one form for each of the two parse and generate methods.

Api available at:
vhost/api/index.php


takes post or request inputs:

parameter|value
---------|--------
method|parse or generate
if method=parse|number = value
if method=generate|string = value

##Code

### parse function:
converts a roman number to an int

There are lots of examples in the php documentation and on stackoverflow.
Rather than use one of those (they should be fine with testing) I have written my own.

Using the PEAR or ZEND implementations would probably be safer, but thats outside the scope of this 
task.

The general method in this function is to populate an array with 'letter' => 'value' pairs and compare to a reference array, 
summing as we go (or if the next digit is less than the current digit, subtract it from the current digit).

eg XIV becomes 5-1+10 = 14
this then becomes pretty easy and is just an if / else to determine if we add or subtract

### generate function:
Generates a roman number from an int.
Max value is 3999 (though in the function this can be changed with an input parameter).

Basic working is:
Take a value from an array (with an associated letter).
See how many times the input number can be divided by the reference number.
Pop those values onto a stack.
Add the remainder to a variable and loop through till there is no remainder left.
Then loop through the stack, building our number.

The final step is to str_replace IIII with IV, VIV with IX, etc
Another way for larger numbers would be to loop through all the keys in the array who have '4' of a character and shift things round before creating out number.
for speed, I went with the str_replace, though I wouldnt necessarily do this in a production environment.

### Other functions
I added in a couple of helper functions:
One to validate the roman numeral contains only MCDLXV or I characters.
One to validate that the int is < max val (default 3999) and is infact an int.

## Build Process

Build / testing process

I have included some phpunit tests (though they arent extensive, but demonstrate a few tests for each of the methods in the class implementation, including testing for expected exceptions)

Builds / tests were performed on [travis-ci](https://travis-ci.org/localhost8080/roman-numerals)

Using [php-unit](http://phpunit.de/) and tested with [phpcs](https://github.com/squizlabs/PHP_CodeSniffer) using a modified version of the [wordpress coding standard](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards) (though the project doesnt use wordpress itsself)

Version control system used was git on [github](https://github.com/localhost8080/roman-numerals)


Initial development and testing was performed on a centos 6 virtualbox with php 5.4 and apache and phpunit

The build process is as follows:
 - code edited in eclipse on a mac
 - commits made to github
 - travis-ci polls github for new commits and pulls 'head' revision on changes
 - travis-ci performs build and unit-tests

simultaneously the centos 6 vitrualbox polls the github and downloads the new code

 - mesasges are sent to 'slack' which notifies the dev when the build process in travis is complete (and if its good or bad)
 - messages are sent to 'slack' which notifies the dev when a new commit has been pulled to the development box


## Notes

Code includes:

 - Try / catch loops with exception handling
 - While loops
 - Foreach loops
 - Arrays
 - Variables
 - Switch statements
 - Basic Oo things (eg inheritance, data available within the scope of the class, though doesnt have any private methods / isnt a singleton, doesnt need a constructor, etc etc)

There is no roman number for 0

While this task is designed to build some code from scratch with tests, etc, in a production environment its not always advisable to re-invent the wheel:
the zend framework 1 has a comprehensive library for all sorts of conversions [here](http://framework.zend.com/manual/1.0/en/zend.measure.types.html)
this component could easilly be used on on its own or alongside zf2 within a larger application, eg using composer

There is also a PEAR library for roman numeral conversion (though the code is no longer maintained, it suports conversion of numbers up to 5,999,999)

There is no testing of the lib.js in the travis system, though it has been tested using brackets editor and jsHint locally
JsHint can be included in the travis build process to automate this task.
There is no scripted testing of the html output (generally run through w3 validator or equivalent)


