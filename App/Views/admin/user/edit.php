<div class="container-fluid">
  <h5 class="h5 mb-4 text-gray-800">Edit <?= Auth::user()->username ?> Profile</h5>
  
  <?php include_once APP['APP_ROOT'] . '/Views/templates/form-errors.php'; ?>
  <?php include_once APP['APP_ROOT'] . '/Views/templates/form-success.php'; ?>

  <form action="/system/user/update?id=<?= Auth::user()->user_id ?>" autocomplete="off" method="POST" enctype="multipart/form-data">
    <div class="card shadow mb-4" >
      <div class="card-header py-3">
        <h6 class="text-primary m-0 font-weight-bold ">Form to update <?= Auth::user()->username ?> information</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Username : </label>
            <input type="text" name="username"  value="<?= Auth::user()->username ?>" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"> Password : </label>
            <input type="password"  name="password" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold">
            Password Confirmation : </label>
            <input type="password"  name="password_confirmation" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Firstname : </label>
            <input type="text"  value="<?= Auth::user()->firstname ?>" name="firstname" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Middlename : </label>
            <input type="text"   value="<?= Auth::user()->middlename ?>" name="middlename" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Lastname : </label>
            <input type="text"  value="<?= Auth::user()->lastname ?>" name="lastname" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Birthdate : </label>
            <input type="date"  required value="<?= Auth::user()->birthdate ?>" name="birthdate" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Gender : </label>
            <select name="gender" class="form-control">
                <option value="Male" <?= Auth::user()->gender === 'Male' ? 'selected' :null ?> >Male</option>
                <option value="Female" <?= Auth::user()->gender === 'Female' ? 'selected' :null ?>>Female</option>
            </select>
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold">Profile : </label>
            <input type="file" name="profile" class="shadow-none" style="outline:none;">
          </div>
          <div class="form-group col-lg-12">
              <div class="float-right">
                <input type="submit" value="Update <?= Auth::user()->username ?> information" class="btn btn-sm btn-primary">
              </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
