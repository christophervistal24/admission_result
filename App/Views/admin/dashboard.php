<div class="block">
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
                    <th class="text-center d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                    <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">P - First Course</th> -->
                    <!-- <th class="d-none d-sm-table-cell" style="width: 15%;">P - Second Course</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admission_result as $keys => $value): ?>
                <tr>
                    <?php foreach ($value as $items => $values): ?>
                     <td class="text-capitalize text-center"><?= $values; ?></td>
                    <?php endforeach ?>
                    <td class="text-center">
                        <a href="vprofile?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Full Result">
                        <i class="fa fa-user"></i>
                        </a>
                        <a href="editresult?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit Full Result">
                        <i class="fa fa-edit"></i>
                        </a>
                        <a href="print?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Print Full Result">
                        <i class="fa fa-print"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>