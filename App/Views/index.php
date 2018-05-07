<form class="form-signin" method="POST" action="">
  <div class="container mb-4">
    <div class="text-center mb-4">
      <!-- <img class="img-fluid" src="<?= APP['DOC_ROOT'] . '/assets/img/SDSSULOGO.png' ?>"> -->
    </div>
  </div>
  <div class="form-label-group">
    <input type="text" id="username" class="form-control" name="username" placeholder="Email address" required autofocus>
    <label for="username">Username</label>
  </div>
  <div class="form-label-group">
    <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
    <label for="password">Password</label>
  </div>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn  btn-primary rounded-0" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; <?= $copyright; ?></p>
</form>