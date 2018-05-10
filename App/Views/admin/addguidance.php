<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">List of <small>Admission results</small></h3>
    </div>
    <div class="block-content block-content-full">
        <form id="addNewGuidanceCounselor" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-lg-12">
                    <label>Fullname with degree</label>
                    <input type="text" required name="fullname_with_degree" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label>Position : </label>
                    <input type="text" required name="position" id="position" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="">Signature ( Attach an image )</label>
                    <input type="file" required name="signature_image" id="signature_image">
                </div>
            </div>
            <input type="hidden" required name="action" value="add_new_g_counselor">
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-primary rounded-0 border-0">
            </div>
            <br>
        </form>
    </div>
</div>