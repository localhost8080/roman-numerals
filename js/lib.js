/*jslint browser: true*/
/*global $, jQuery*/

// above are some comments for jshint - so that it understands jquery is defined in another file

// these could be simplified and generalised;
// eg call_api /api?method={$_REQUEST['method']}
// also, there should be error checking and sanitisation of user input at this stage

function call_parse_api(object) {
    "use strict";
    // call the parse function through our mini api
    $.getJSON('/api/?method=parse', object.serialize(), function (data) {
        $('#string_results').html(data);
    });
}

function call_generate_api(object) {
    "use strict";
    // call the parse function through our mini api
    $.getJSON('/api/?method=generate', object.serialize(), function (data) {
        $('#number_results').html(data);
    });
}

$(function () {
    "use strict";
    // bind keypresses on the form input to trigger the validator
    $('#number').on("input", function () {
        call_generate_api($('#number'));
    });
    $('#string').on("input", function () {
        call_parse_api($('#string'));
    });
});
