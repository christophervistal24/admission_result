/*jshint esversion:6*/
$('#changeInformationProfile').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
        rules: {
                'password': {
                    required: true,
                    minlength: 4,
                    remote:{
                        url:"/../../system/App/Views/ajax/personal_information.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: function(){
                                return $("#val_password").val();
                            },
                            action: function(){
                                return 'check_password';
                            }
                        },
                    }
                },
                'firstname': {
                    required: true,
                    minlength:5,
                },
                'middlename':{
                    required:true,
                },
                'lastname':{
                    required:true,
                    minlength:5,
                },
                'birthday':{
                    required:true,
                },
                'gender':{
                    required:true,
                }
            },
            messages: {
                'password': {
                 required: 'Please provide a password',
                 minlength: 'Your password must be at least 8 characters long',
                 remote:$.validator.format("Please check your password")
                },
                'firstname':{
                    required: 'Please enter firstname',
                    minlength: 'Your password must be at least 5 characters long',
                },
                'middlename':{
                    required:'Please enter middlename',
                },
                'lastname':{
                    required:'Please enter lastname',
                    minlength:'Your lastname must be at least 5 characters long'
                },
                'birthday':{
                    required:'Please choose your birthday'
                },
                'gender':{
                    required:'Please select gender',
                }
             },
              submitHandler: function(form){
                 $.ajax({
                    url:'/../../system/App/Views/ajax/personal_information.php',
                    type:"POST",
                    dataType:"json",
                    data:$(form).serialize(),
                    success:function(data){
                        if(data.success == true){
                            swal("Success!", data.message, "success");
                            $('#side_overlay_name').html(data.lastname + ' , ' + data.firstname + ' ' + data.middlename.substr(0,1) + '. ');
                            $('#top_right_name').html(data.lastname + ' , ' + data.firstname + ' ' + data.middlename.substr(0,1) + '.' + '<i class="fa fa-angle-down ml-5"></i>');
                            $('#sidebar_name').html(data.lastname + ' , '  + data.firstname + ' ' + data.middlename.substr(0,1) + '. ');
                        }
                    }
                });
                return false;
            }
    });

  $('#changePassword').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
        rules: {
                'change_current_password': {
                    required: true,
                    minlength: 4,
                     remote:{
                        url:"/../../system/App/Views/ajax/personal_information.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: function(){
                                return $("#change_current_password").val();
                            },
                            action: function(){
                                return 'check_password';
                            }
                        },
                    }
                },
                'change_new_password':{
                    required : true,
                    minlength : 4,
                     remote:{
                        url:"/../../system/App/Views/ajax/personal_information.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: function(){
                                return $("#change_new_password").val();
                            },
                            action: function(){
                                return 'check_password2';
                            }
                        },
                    }
                },
                'change_new_confirm_password':{
                    required : true,
                    minlength : 4,
                    equalTo: '#change_new_password',
                },
            },
            messages: {
                'change_current_password':{
                 required: 'Please enter your current password',
                 remote:$.validator.format("Please check your password")
                },

                'change_new_password': {
                 required: 'Please enter your new password',
                 minlength: 'Your password must be at least 8 characters long',
                 remote:$.validator.format("Please don't type your current password"),
                },

                'change_new_confirm_password':{
                    required: 'Re-type password is required',
                    minlength: 'Your password must be at least 8 characters long',
                    equalTo : 'Re-type password must be matched at new password',
                }
             },
              submitHandler: function(form){
                 $.ajax({
                    url:'/../../system/App/Views/ajax/personal_information.php',
                    type:"POST",
                    dataType:"json",
                    data:$(form).serialize(),
                    success:function(data){
                        if(data.success == true){
                            swal("Success!", data.message, "success");
                            $(form)[0].reset();
                        }
                     },
                });
                return false;
            }
    });

  $('#changeUsername').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
        rules: {
                'username': {
                    required: true,
                    minlength: 5,
                    remote:{
                        url:"/../../system/App/Views/ajax/personal_information.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            username: function(){
                                return $("#username").val();
                            },
                            action: function(){
                                return 'check_username';
                            }
                        },
                    }
                },
                'username_password':{
                    required: true,
                    minlength: 4,
                     remote:{
                        url:"/../../system/App/Views/ajax/personal_information.php",
                        type:"POST",
                        dataType :"json",
                        data: {
                            password: function(){
                                return $("#password").val();
                            },
                            action: function(){
                                return 'check_password';
                            }
                        },
                    }
                }
            },
            messages: {
                'username': {
                    required: 'Please enter a username',
                    minlength:"Username must be minimum of {0} characters",
                    remote:$.validator.format("{0} is already exists")
                },
                'username_password':{
                 required: 'Please provide your current password',
                 remote:$.validator.format("Check your password")
                }

             },
              submitHandler: function(form){
                $.ajax({
                    url:'/../../system/App/Views/ajax/personal_information.php',
                    type:"POST",
                    dataType:"json",
                    data:$(form).serialize(),
                    success:function(data){
                        if(data.success == true){
                            swal("Success!", data.message, "success");
                            $(form)[0].reset();
                        }
                    },
                });
                return false;
            }
    });

$(document).ready(function(){
    $.validator.addMethod("filesize",function(value,element,param){
        return this.optional(element) || (element.files[0].size <= param);
    },'Filesize must be less than 1MB');
    $('#changeProfile').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
             rules: {
                'profile_picture':{
                    required:true,
                    accept: "image/jpg,image/jpeg,image/png,image/gif",
                    filesize: 1048576,
                }
            },
            messages: {
                'profile_picture':{
                    required:'Please attach some image',
                    accept: 'Image must be JPEG , JPG , PNG or GIF'
                }
             },
              submitHandler: function(form){
                  $.ajax({
                    url:'/../../system/App/Views/ajax/personal_information.php',
                    type:"POST",
                    dataType:"json",
                    data:new FormData(form),
                    processData : false,
                    contentType:false,
                    success:function(data){
                        if(data.success == true){
                            swal("Success!", data.message, "success");
                            $(form)[0].reset();
                            $('#change_info_img').attr('src','/system/assets/img/uploads/'+data.img);
                            $('#sidebar_img').attr('src','/system/assets/img/uploads/'+data.img);
                        }
                    },
                });
                return false;
            }
    });
});
