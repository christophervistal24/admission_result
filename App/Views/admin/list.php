<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">List of <small>Guidance Councelors</small></h3>
    </div>
    <div class="block-content block-content-full">
        <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/be_tables_datatables.js -->
        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Full name</th>
                    <th class="text-center d-none d-sm-table-cell">Position</th>
                    <th class="text-center d-none d-sm-table-cell">Signatures</th>
                    <th class="text-center d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guidance_conselors as $keys => $value): ?>
                <tr>
                    <td class="text-center"><?= $value['id'] ?></td>
                    <td><?= $value['fullname'] ?></td>
                    <td class="text-center"><?= $value['position'] ?></td>
                    <td class="text-center"><img  class="img-fluid" style="width:8%" src="<?= APP['DOC_ROOT'] ?>assets/img/uploads/<?= $value['signature'] ?>" alt=""></td>
                    <td class="text-center"><a href="editguidance?id=<?= $value['id']?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit Informations">
                            <i class="fa fa-edit"></i>
                        </a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>