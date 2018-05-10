$('#editAdmissionResult').submit(function(e){
e.preventDefault();
$.ajax({
url:'/../../system/App/Views/ajax/admission_test_result.php',
type:"POST",
dataType:"json",
data:$(this).serialize(),
success:function(data){
   if (data.success == true) {
        $('#editAdmissionResult')[0].reset();
        $('#examiner_firstname').val(data.firstname);
        $('#examiner_middlename').val(data.middlename);
        $('#examiner_lastname').val(data.lastname);
        $('#examiner_sex').val(data.sex);
        $('#examiner_age').val(data.age);
        $('#examiner_birthdate').val(data.birthdate);
        // $('#examiner_first_course').select(data.firs);
        // $('#examiner_second_course').select(data.firs);
        // $('#guidance_counselor_name').val('');
        $('#over_all_total').val(data.over_all_total);
        $('#total_of_verbal').val(data.verbal_total);
        $('#verbal-comprehension').val(data.verbal_comprehension);
        $('#verbal-reasoning').val(data.verbal_reasoning);
        $('#total_of_non_verbal').val(data.non_verbal_total);
        $('#figurative-reasoning').val(data.figurative_reasoning);
        $('#quantitative-reasoning').val(data.quantitative_reasoning);
        swal({
          title: "Do you want to print this result?",
          text: "just hit the print button",
          icon: "success",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            location.replace('print?id='+data.result_id);
          } else {
            location.reload();
          }
        });
   }
}
});
});
