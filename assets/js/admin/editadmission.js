$('#editAdmissionResult').submit(function(e){
e.preventDefault();
$.ajax({
url : '/system/admission/update',
type:"POST",
dataType:"json",
data:$(this).serialize(),
success:function(data){
   if (data.success == true) {
        swal({
          title: "Do you want to print this result?",
          text: "just hit the print button",
          icon: "success",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            location.replace('/system/admission/print?id='+data.result_id);
          }
        });
   }
}
});
});
