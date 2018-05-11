$('#addNewGuidanceCounselor').submit(function(e){
e.preventDefault();
  $.ajax({
      url:'/../../system/App/Views/ajax/guidance_counselor.php',
      type:"POST",
      dataType:"json",
      data:new FormData(this),
      processData : false,
      contentType:false,
      success:function(data){
          if (data.success == true) {
               $('#addNewGuidanceCounselor')[0].reset();
              swal({
                title: "Message",
                text: data.message,
                icon: "success",
              });
          }
      }
  });
});

$('#guidance_counselor_name').change(function(){
  let id = $('#guidance_counselor_name').val();
  $.ajax({
      url:'/../../system/App/Views/ajax/guidance_counselor.php',
      type:"POST",
      dataType:"json",
      data:{guidance_id:id,action:'getDetails'},
      success:function(data){
        $('#signature_image').attr('src','/../../system/assets/img/uploads/'+data.informations.signature);
        // $('#guidance_counselor_name').val(data.informations.fullname);
        $('#guidance_counselor_name').attr('value',data.informations.id);
        $('#position').html(data.informations.position);
      }
  });
});

// edit information of guidance counselor
$('#editCounselor').submit(function(e){
  e.preventDefault();
   $.ajax({
      url:'/../../system/App/Views/ajax/guidance_counselor.php',
      type:"POST",
      dataType:"json",
      data:new FormData(this),
      processData : false,
      contentType:false,
      success:function(data){
        swal("Success!", data.message, "success");
        $('#signature_').attr('src','/../../system/assets/img/uploads/'+data.image);
      }
  });
});
