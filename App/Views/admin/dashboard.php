<div class="block">
    <div class="row gutters-tiny">
        <!-- Row #1 -->
        <div class="col-md-6 col-xl-3">
            <a class="block block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 font-w700"><?= $no_of_admission_results; ?></div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">No. of Admission Results</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 font-w700"><?= $no_of_deleted_admission_results; ?></div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">No. of Deleted Admission Results</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full text-right">
                    <div class="font-size-h2 font-w700"><?= $guidance_conselors; ?></div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">No.  of Guidance Counselors</div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-3">
            <a class="block block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full text-right">
                    <div class="font-size-h2 font-w700"><?= $no_of_users; ?></div>
                    <div class="font-size-sm font-w600 text-uppercase text-muted">No. of Users</div>
                </div>
            </a>
        </div>
        <!-- END Row #1 -->
    </div>
    <div class="block-header block-header-default">
        <h3 class="block-title">List of <small>Admission results</small></h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Full name</th>
                    <!-- <th class="text-center d-none d-sm-table-cell">V. Comprehension</th> -->
                    <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">V. Reasoning</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">F. Reasoning</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Q. Reasoning</th>-->
                    <th class="text-center d-none d-sm-table-cell" style="width: 15%;">V. Total</th>
                    <th class="text-center d-none d-sm-table-cell" style="width: 15%;">Non V. Total</th>
                    <th class="text-center d-none d-sm-table-cell" style="width: 15%;">Over All Total</th>
                    <th class="text-center d-none d-sm-table-cell">Actions</th>
                    <th class="text-center d-none d-sm-table-cell" style="width: 15%;">Delete</th>
                    <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">P - First Course</th> -->
                    <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">P - Second Course</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admission_result as $keys => $value): ?>
                <tr>
                    <td class="text-capitalize text-center"><?= $value['id']; ?></td>
                    <td class="text-capitalize text-center"><a href="print?id=<?= $value['id'] ?>"><?= $value['Name']; ?></a></td>
                    <td class="text-capitalize text-center"><?= $value['verbal_total']; ?></td>
                    <td class="text-capitalize text-center"><?= $value['non_verbal_total']; ?></td>
                    <td class="text-capitalize text-center"><?= $value['over_all_total']; ?></td>
                    <td class="text-center text-sm-center">
                        <a href="vprofile?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Profile"><i class="fa fa-user"></i></a>
                        <a href="editresult?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit Full Result">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="print?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Print Full Result">
                            <i class="fa fa-print"></i>
                        </a>
                    </td>
                    <td class="text-center text-sm-center">
                        <a href="delete?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete Result">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>