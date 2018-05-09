$('.verbal-score').keyup(function(){
     $('#total_of_verbal').val(parseFloat("0"+$('#verbal-comprehension').val()) + parseFloat("0"+$('#verbal-reasoning').val()));
     $('#over_all_total').val(parseFloat("0"+$('#total_of_verbal').val()) + parseFloat("0"+$('#total_of_non_verbal').val()));
});

$('.non-verbal-score').keyup(function(){
    $('#total_of_non_verbal').val(parseFloat("0"+$('#figurative-reasoning').val()) + parseFloat("0"+$('#quantitative-reasoning').val()));
    $('#over_all_total').val(parseFloat("0"+$('#total_of_verbal').val()) + parseFloat("0"+$('#total_of_non_verbal').val()));
});