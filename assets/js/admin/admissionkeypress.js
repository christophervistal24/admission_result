$(".verbal-score").keyup(function(){

     let comprehension_score = $('#verbal-comprehension').val();
     let reasoning_score     = $('#verbal-reasoning').val();

     $("#total_of_verbal").val(parseFloat("0"+comprehension_score) + parseFloat("0"+reasoning_score));
     $("#over_all_total").val(parseFloat("0"+$("#total_of_verbal").val()) + parseFloat("0"+$("#total_of_non_verbal").val()));

     $("#verbal_total-equivalent").val(calculateEquivalent($("#total_of_verbal").val(),[21,13]));
     $("#over_all_total_equivalent").val(calculateEquivalent($("#over_all_total").val(),[64,25]));

});


$(".non-verbal-score").keyup(function(){

    $("#total_of_non_verbal").val(parseFloat("0"+$("#figurative-reasoning").val()) + parseFloat("0"+$("#quantitative-reasoning").val()));
    $("#over_all_total").val(parseFloat("0"+$("#total_of_verbal").val()) + parseFloat("0"+$("#total_of_non_verbal").val()));

    $("#non_verbal-equivalent").val(calculateEquivalent($("#total_of_non_verbal").val(),[24,13]));
    $("#over_all_total_equivalent").val(calculateEquivalent($("#over_all_total").val(),[64,25]));
});

$("#verbal-comprehension").keyup(function(){
     $("#verbal_comprehension_equivalent").val(calculateEquivalent($(this).val(),[8,5]));
     $("#verbal_total-equivalent").val(calculateEquivalent($(this).val(),[21,13]));
});

$("#verbal-reasoning").keyup(function(){
    $("#verbal_reasoning_equivalent").val(calculateEquivalent($(this).val(),[13,8]));
});

$("#figurative-reasoning").keyup(function(){
     $("#figurative-equivalent").val(calculateEquivalent($(this).val(),[11,6]));
});

$("#quantitative-reasoning").keyup(function(){
    $("#quantitative-equivalent").val(calculateEquivalent($(this).val(),[13,7]));
});


let calculateEquivalent  = (value,compare = []) => {
    if (value > compare[0]) {
        return "Above Average";
    }else if (value < compare[1]){
        return "Below Average";
    }else{
        return "Average";
    }
};