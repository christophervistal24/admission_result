<div class="container-fluid">
  <h5 class="h5 mb-4 text-gray-800 text-capitalize"><?= $title ?></h5>
  <form action="/system/user/update?id=<?= $user->info_id ?>" autocomplete="off" method="POST" enctype="multipart/form-data">
    <div class="card shadow mb-4" >
      <div class="card-header py-3">
        <h6 class="text-primary m-0 font-weight-bold ">Form to update <?= $user->username ?> information</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Username : </label>
            <input type="text" required name="username" value="<?= $user->username ?>" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"> Password : </label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold">
            Password Confirmation : </label>
            <input type="password"  name="password_confirmation" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Firstname : </label>
            <input type="text" required value="<?= $user->firstname ?>" name="firstname" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Middlename : </label>
            <input type="text" required value="<?= $user->middlename ?>" name="middlename" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Lastname : </label>
            <input type="text" required value="<?= $user->lastname ?>" name="lastname" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Birthdate : </label>
            <input type="date" required value="<?= $user->birthdate ?>" name="birthdate" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Gender : </label>
            <select name="gender" class="form-control">

                <option value="Male" <?= $user->gender === 'Male' ? 'selected' :null ?> >Male</option>
                <option value="Female" <?= $user->gender === 'Female' ? 'selected' :null ?>>Female</option>
            </select>
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold">Profile : </label>
            <input type="file" name="profile" class="shadow-none" style="outline:none;">
          </div>
          <div class="form-group col-lg-12">
              <div class="float-right">
                <input type="submit" value="Update <?= $user->username ?> information" class="btn btn-sm btn-primary">
              </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
