<?php 
    if (isset($_SESSION['errors'])) {
?>
    <script>
        swal("Message","<?= $_SESSION['errors'] ?>","error");
    </script>
<?php
    unset($_SESSION['errors']);
    }
?>
