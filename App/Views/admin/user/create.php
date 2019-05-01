<div class="container-fluid">
  <h5 class="h5 mb-4 text-gray-800 text-capitalize">Create new user</h5>
  <form action="/system/user/store" autocomplete="off" method="POST" enctype="multipart/form-data">
    <div class="card shadow mb-4" >
      <div class="card-header py-3">
        <h6 class="text-primary m-0 font-weight-bold text-primary">Form to create new user</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Username : </label>
            <input type="text" required name="username" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Password : </label>
            <input type="password" required name="password" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> 
            Password Confirmation : </label>
            <input type="password" required name="password_confirmation" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Firstname : </label>
            <input type="text" required name="firstname" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Middlename : </label>
            <input type="text" required name="middlename" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Lastname : </label>
            <input type="text" required name="lastname" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Birthdate : </label>
            <input type="date" required name="birthdate" class="form-control">
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Gender : </label>
            <select name="gender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
          </div>
          <div class="form-group col-lg-4">
            <label class="font-weight-bold"><span class="text-danger">*</span> Profile : </label>
            <input type="file" required name="profile" class="shadow-none" style="outline:none;">
          </div>
          <div class="form-group col-lg-12">
              <div class="float-right">
                <input type="submit" value="Create new user" class="btn btn-sm btn-primary">
              </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
