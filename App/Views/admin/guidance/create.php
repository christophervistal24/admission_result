<div class="container-fluid">
    <h5 class="h5 mb-4 text-gray-800 text-capitalize">Add new Guidance Counselor</h5>
    <?php include_once APP['APP_ROOT'] . '/Views/templates/form-errors.php'; ?>
    <?php include_once APP['APP_ROOT'] . '/Views/templates/form-success.php'; ?>
    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h6 class="text-primary m-0 font-weight-bold text-primary">Form for new guidance counselor</h6>
        </div>
        <div class="card-body">
            <form action="/system/guidance/store" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="font-weight-bold">Fullname with degree : </label>
                        <input type="text" required name="fullname_with_degree" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="font-weight-bold">Position : </label>
                        <input type="text" required name="position" id="position" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label class="font-weight-bold">Signature ( Attach an image )</label>
                        <input type="file"  required name="signature_image" id="signature_image">
                    </div>
                </div>
                <div class="form-group float-right">
                    <input type="submit" value="Add new guidance counselor" class="btn btn-primary rounded-0 border-0">
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
