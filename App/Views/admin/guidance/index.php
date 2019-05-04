<div class="container-fluid p-3" style="background:white;">
  <h5 class="h5 mb-4 text-gray-800 text-capitalize">List of all Guidance counselor</h5>
  <div class="float-right">
    <a  class="text-capitalize btn btn-primary btn-sm rounded-0" href="/system/guidance/create">New Guidance counselor</a>
  </div>
  <br>
  <br>
  <div class="clearfix"></div>
  <table class="table table-bordered" id="guidanceCounselorsTable">
    <thead>
            <th class="text-center">ID</th>
            <th class="text-center">Full name</th>
            <th class="text-center d-none d-sm-table-cell">Position</th>
            <th class="text-center d-none d-sm-table-cell">Signatures</th>
            <th class="text-center d-none d-sm-table-cell">Actions</th>
    </thead>
    <tbody>
            <?php foreach ($guidance_counselors as $keys => $guidance_counselor): ?>
                <tr>
                    <td class="text-center"><?= $guidance_counselor->id ?></td>
                    <td class="font-weight-bold text-truncate"><?= $guidance_counselor->fullname ?></td>
                    <td class="text-center font-weight-bold text-truncate"><?= $guidance_counselor->position ?></td>
                    <td class="text-center">
                        <img 
                        class="img-fluid text-truncate"
                        style="width:8%" 
                        src="<?= APP['DOC_ROOT'] ?>assets/img/uploads/<?= $guidance_counselor->signature ?>">
                    </td>
                    <td class="text-center">
                        <a 
                            href="edit?id=<?= $guidance_counselor->id?>" 
                            class="btn btn-sm btn-primary" 
                            data-toggle="tooltip" 
                            title="Edit Information">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
    </tbody>
  </table>
</div>
