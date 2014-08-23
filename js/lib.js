$(function() {
    // bind keypresses on the form input to trigger the validator
    $('#number').on("input", function() {
        call_generate_api($('#number'));
    });
    $('#string').on("input", function() {
        call_parse_api($('#string'));
    });
});

// these could be simplified and generalised;
// eg call_api /api?method={$_REQUEST['method']}

function call_parse_api(object) {
    // call the parse function through our mini api
    $.getJSON('/api/?method=parse', object.serialize(), show_result);
    $('#number_results').html(object);
}
function call_generate_api(object) {
    // call the parse function through our mini api
    $.getJSON('/api/?method=generate', object.serialize(), show_result);
    $('#string_results').html(object);
}
