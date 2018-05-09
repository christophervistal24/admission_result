$('#addAdmissionResult').submit(function(e){
e.preventDefault();
$.ajax({
    url:'/../../system/App/Views/ajax/admission_test_result.php',
    type:"POST",
    dataType:"json",
    data:$(this).serialize(),
    success:function(data){
       if (data.success == true) {
            $('#addAdmissionResult')[0].reset();
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
                //proceed to pdf page
                // swal("Poof! Your imaginary file has been deleted!", {
                //   icon: "success",
                // });
              } else {
                // swal("Your imaginary file is safe!");
                // go back here
              }
            });
       }
    }
});
});