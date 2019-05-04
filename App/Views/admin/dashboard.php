<div class="container-fluid p-3" style="background:white;">
  <!-- <h5 class="h5 mb-4 text-gray-800 text-capitalize">Dashboard</h5> -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No. of Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $no_of_users->count ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">guidance counselors</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $guidance_conselors ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admission Results</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $no_of_admission_results ?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Deleted Admission Results</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $no_of_deleted_admission_results ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--   <div class="float-right">
    <a  class="text-capitalize btn btn-primary btn-sm rounded-0" href="/system/admission/create">New admission result</a>
  </div>
  <br>
  <br> -->
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
          <a href="/system/admission/print?id=<?= $value['id']?>" class="btn btn-sm btn-info" data-toggle="tooltip" title="Print Full Result">
            <i class="fa fa-print"></i>
          </a>
          <a href="/system/admission/delete?id=<?= $value['id']?>" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete Result">
            <i class="fa fa-trash"></i>
          </a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
