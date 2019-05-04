<div class="container-fluid">
  <h5 class="h5 mb-4 text-gray-800 text-capitalize">List of all user</h5>
  <div class="float-right">
    <a  class="text-capitalize btn btn-primary btn-sm rounded-0" href="/system/user/create">New User</a>
  </div>
  <br>
  <br>
  <div class="clearfix"></div>
  <table class="table table-bordered" id="usersTable">
    <thead>
      <th>Username</th>
      <th>Firstname</th>
      <th>Middlename</th>
      <th>Lastname</th>
      <th>Gender</th>
      <th>Birthdate</th>
      <th>Created at</th>
      <th class="text-center">Actions</th>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user->username ?></td>
        <td><?= $user->firstname ?></td>
        <td><?= $user->middlename ?></td>
        <td><?= $user->lastname ?></td>
        <td><?= $user->gender ?></td>
        <td><?= $user->birthdate ?></td>
        <td class="text-center text-truncate"><?= date(' jS \of F Y ',$user->created_at) ?></td>
        <td class="text-center"><button class="btn btn-primary btn-sm">Profile</button> <a class="btn btn-info btn-sm" href="/system/user/edit?id=<?= $user->id ?>">Edit User</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
