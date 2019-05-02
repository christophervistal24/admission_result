<div class="container-fluid">
  <h5 class="h5 mb-4 text-gray-800 text-capitalize">Dashboard</h5>
  <div class="float-right">
    <a  class="text-capitalize btn btn-primary btn-sm rounded-0" href="/system/admission/create">New admission result</a>
  </div>
  <br>
  <br>
  <div class="clearfix"></div>
  <table class="table table-bordered" id="admissionResultTable">
    <thead>
      <th class="text-center">ID</th>
      <th class="text-center">Full name</th>
      <th class="text-center d-none d-sm-table-cell text-truncate">V. Total</th>
      <th class="text-center d-none d-sm-table-cell text-truncate">Non V. Total</th>
      <th class="text-center d-none d-sm-table-cell text-truncate">Over All Total</th>
      <th class="text-center d-none d-sm-table-cell text-truncate">Actions</th>
    </thead>
    <tbody>
      <?php foreach ($admission_result as $keys => $value): ?>
      <tr>
        <td class="text-capitalize text-center"><?= $value['id']; ?></td>
        <td class="text-capitalize text-center text-truncate"><a href="/system/admission/print?id=<?= $value['id'] ?>"><?= $value['Name']; ?></a></td>
        <td class="text-capitalize text-center"><?= $value['verbal_total']; ?></td>
        <td class="text-capitalize text-center"><?= $value['non_verbal_total']; ?></td>
        <td class="text-capitalize text-center"><?= $value['over_all_total']; ?></td>
        <td class="text-center text-sm-center">
          <a href="/system/admission/show?id=<?= $value['id']?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View Profile"><i class="fa fa-user"></i></a>
          <a href="/system/admission/edit?id=<?= $value['id']?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit Full Result">
            <i class="fa fa-edit"></i>
          </a>
          <a href="/system/admission/print?id=<?= $value['id']?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Print Full Result">
            <i class="fa fa-print"></i>
          </a>
          <a href="/system/admission/delete?id=<?= $value['id']?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Delete Result">
            <i class="fa fa-trash"></i>
          </a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
