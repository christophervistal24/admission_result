</div>
</main>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
<!-- Codebase Core JS -->
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/jquery.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/popper.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/bootstrap.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/jquery.slimscroll.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/jquery.scrollLock.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/jquery.appear.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/jquery.countTo.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/core/js.cookie.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/codebase.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/pages/be_tables_datatables.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/pages/be_forms_wizard.js"></script>


<script>
    $(document).ready(function(){
        $('.verbal-score').keyup(function(){
             $('#total_of_verbal').val(parseFloat("0"+$('#verbal-comprehension').val()) + parseFloat("0"+$('#verbal-reasoning').val()));
                $('#over_all_total').val(parseFloat("0"+$('#total_of_verbal').val()) + parseFloat("0"+$('#total_of_non_verbal').val()));
        });

        $('.non-verbal-score').keyup(function(){
                $('#total_of_non_verbal').val(parseFloat("0"+$('#figurative-reasoning').val()) + parseFloat("0"+$('#quantitative-reasoning').val()));
                $('#over_all_total').val(parseFloat("0"+$('#total_of_verbal').val()) + parseFloat("0"+$('#total_of_non_verbal').val()));
        });


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


    });
</script>
</body>
</html>