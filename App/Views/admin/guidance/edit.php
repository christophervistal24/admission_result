<div class="container-fluid">
    <h5 class="h5 mb-4 text-gray-800 text-capitalize">Edit Guidance Counselor</h5>
    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h6 class="text-primary m-0 font-weight-bold text-primary">Form to update guidance counselor</h6>
        </div>
        <div class="card-body">
            <form action="/system/guidance/update?id=<?=$counselor_information['id']?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="font-weight-bold">Fullname with degree : </label>
                        <input type="text" required name="fullname_with_degree" value="<?= $counselor_information['fullname'] ?>" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="font-weight-bold">Position : </label>
                        <input type="text" required name="position" value="<?= $counselor_information['position'] ?>"  class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-center text-primary">Signature</h6>
                            </div>
                            <div class="card-body">
                                <center>
                                    <img class="img-fluid" src="<?= APP['DOC_ROOT'] ?>assets/img/uploads/<?= $counselor_information['signature'] ?>" alt="">
                                </center>
                                <hr>
                                <input type="file" name="signature_image" id="signature_image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group float-right">
                    <input type="submit" value="Update counselor" class="btn btn-success font-weight-bold rounded-0 border-0">
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
