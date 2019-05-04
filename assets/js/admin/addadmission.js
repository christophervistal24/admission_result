
$('#addAdmissionResult').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url :'/system/admission/store',
        type :"POST",
        dataType : "json",
        data : $(this).serialize(),
        success : function(data) {
           if (data.success == true) {
                $('#addAdmissionResult')[0].reset();
                swal({ title: "Do you want to print this result?", text: "", icon: "success", buttons: true, dangerMode: true,})
                .then((wantToProceed) => {
                  if (wantToProceed) {
                    location.replace('/system/admission/print?id='+data.result_id);
                  } 
                });
           }
        }
    });
});
