$(function() {
    // bind keypresses on the form input to trigger the validator
    $('#number').on("input", function() {
        call_generate_api($('#number'));
    });
});


function call_parse_api(object) {
    // call the parse function through our mini api
    $.getJSON('/api/?method=parse', object.serialize(), show_result);
}
function call_generate_api(object) {
    // call the parse function through our mini api
    $.getJSON('/api/?method=generate', object.serialize(), show_result);
}

function call_api(object){

}

function show_result(object) {
    $('#results').html(object);
}