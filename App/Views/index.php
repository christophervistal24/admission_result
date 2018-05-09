<div class="block row">
  <div class="block-header block-header-default">
  </div>
  <div class="block-content block-content-full col-lg-6">
    <form class="form-signin" method="POST" action="">
      <div class="container mb-4">
        <div class="text-center mb-4 col-lg-4 m-lg-auto">
          <img class="img-fluid" src="<?= APP['DOC_ROOT'] . '/assets/img/photos/sdssu.png' ?>">
        </div>
      </div>
      <?php if ($user === false): ?>
       <script>
         swal("Message", "Please check your username or password", "error");
       </script>
      <?php endif ?>
      <div class="form-label-group">
        <label for="username">Username</label>
        <input type="text" id="username" class="form-control" name="username" placeholder="Username" required autofocus>
      </div>
      <div class="form-label-group mt-2">
        <label for="password">Password</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button class="float-right  btn mt-3 btn-primary rounded-0" type="submit">Sign in</button>
      <p class="mt-5 mb-3  text-muted text-center"><b>SDSSU ADMISSION RESULT &copy; <?= $copyright; ?></b></p>
    </form>
  </div>
</div>