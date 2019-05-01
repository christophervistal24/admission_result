<div class="container-fluid">
    <h5 class="h5 mb-4 text-gray-800 text-capitalize">Profile</h5>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4" style="height : 62vh;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">&nbsp;</h6>
                </div>
                <div class="card-body">
                       <img class="offset-3 img-profile rounded-circle w-50" src="<?= APP['DOC_ROOT'] . '/assets/img/uploads/' . Auth::user()->profile ?>">
                       <h5 class="mt-3 text-capitalize text-center"><?= Auth::user()->firstname . " " .  substr(Auth::user()->middlename, 0,1) . ". " .   Auth::user()->lastname   ?></h5>
                        <hr class="mt-3">
                        <span>Gender : <?= Auth::user()->gender ?></span>
                        <br>
                        <span>Birthdate : <?= Auth::user()->birthdate ?></span>
                        <br>
                        <span>Username : <?= Auth::user()->username ?></span>
                        <br>
                        <span>Created : <?= date('Y', Auth::user()->created_at) ?></span>
                </div>
            </div>
        </div>
         <div class="col-md-8">
            <div class="card shadow mb-4" style="height : 62vh;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">&nbsp;</h6>
                </div>
                <div class="card-body">
                     <h1 class="text-center" style="opacity : 0.3">Reserved for upcoming feature.</h1>
                </div>
            </div>
    </div>
</div>
