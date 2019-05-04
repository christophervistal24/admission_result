</div>
<footer class="sticky-footer bg-white">
<div class="container my-auto">
    <div class="copyright text-center my-auto">
        <span>Copyright &copy; SDSSU <?= date('Y') ?></span>
    </div>
</div>
</footer>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="/system/admin/logout">Logout</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php 
    // Rebase
    Session::set('errors',null);
    Session::set('status',null);
?>

<script src="<?= APP['DOC_ROOT'] ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="<?= APP['DOC_ROOT'] ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script> -->
<script src="<?= APP['DOC_ROOT'] ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/admin/addadmission.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/admin/editadmission.js"></script>
<script src="<?= APP['DOC_ROOT'] ?>assets/js/admin/admissionkeypress.js"></script>
<!-- Page JS Code -->

<script>
$("#admissionResultTable").dataTable();
$("#guidanceCounselorsTable").dataTable();
$("#usersTable").dataTable();


$("#birthDate").change((function () {
    //get the yearOfBirth
    let yearOfBirth = $("#birthDate").val().split('-')[0];
    //get the current date
    
    let currentDate = new Date().getFullYear();
    $('#examineeAge').val(currentDate - yearOfBirth);
}));

</script>

<script>
// Function for Add new admission result in Guidance section
let guidanceCounselor = document.querySelector('#guidance_counselor_name');
let position          = document.querySelector("#position");
let signatureImage    = document.querySelector('#signature_image');
let signatureDirectory = "/system/assets/img/uploads/";

  guidanceCounselor.addEventListener('change' , (event) => {
      fetch(`/system/guidanceapi/show?id=${event.target.value}`)
      .then(response => response.json())
      .then( data => {
        const guidanceInfo = data;
        for (var key in guidanceInfo) {
            position.innerHTML = guidanceInfo[key].position;

            // Change the image
            signatureImage.setAttribute('src',`${signatureDirectory}${guidanceInfo[key].signature}`);
        }
      });
  });
</script>
</body>
</html>
