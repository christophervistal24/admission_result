<div class="container-fluid p-3" style="background :white;">
  <h5 class="h5 mb-4 text-gray-800 text-capitalize"> <?= $title ?> </h5>
  <hr>
  <table class="table table-bordered" id="rankingsTable">
    <thead>
        <th class="text-center">Rank</th>
        <th>Fullname</th>
        <th class="text-center">Score</th>
        <th class="text-center">Actions</th>
    </thead>
    <tbody>
        <?php foreach ($rankings as $key => $ranking): ?>
            <tr>
                <td class="text-center text-primary font-weight-bold"><?= ($key + 1) ?></td>
                <td class="text-capitalize font-weight-bold"><?= $ranking->fullname ?></td>
                <td class="text-center font-weight-bold text-primary"><?= $ranking->over_all_total ?></td>
                <td class="text-center font-weight-bold text-primary">
                  <a href="/system/admission/show?id=<?= $ranking->id ?>" class="btn btn-primary btn-sm" title="View Profile"><i class="fa fa-user"></i></a>
                  <a href="/system/admission/print?id=<?= $ranking->id ?>" class="btn btn-info btn-sm" title="View Profile"><i class="fa fa-print"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>
