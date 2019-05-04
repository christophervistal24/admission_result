<div class="container emp-profile p-3" style="background :white;">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="<?= APP['DOC_ROOT'] . '/assets/img/uploads/' . Auth::user()->profile ?>" alt=""/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5 class="text-capitalize">
                <?=
                Auth::user()->firstname . ' ' .
                substr(Auth::user()->middlename, 0,1) . '. ' .
                Auth::user()->lastname
                ?>
                </h5>
                <h6>
                Administrator
                </h6>
                <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                <p>&nbsp;</p>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="logs-tab" data-toggle="tab" href="#logs" role="tab" aria-controls="logs" aria-selected="false">User activities</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <a class="text-white btn btn-primary btn-sm rounded-0" href="/system/user/edit">Edit Profile</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
                <p>WORK LINK</p>
                <a href="#" class="text-primary">Links 1</a><br/>
                <a href="#" class="text-primary">Links 2</a><br/>
                <a href="#" class="text-primary">Links 3</a>
                <p>SKILLS</p>
                <a class="text-primary" href="#">Skills 1</a><br/>
                <a class="text-primary" href="#">Skills 2</a><br/>
                <a class="text-primary" href="#">Skills 3</a><br/>
                <a class="text-primary" href="#">Skills 4</a><br/>
                <a class="text-primary" href="#">Skills 5</a><br/>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div style="margin-top : -45px;" class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Username</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= Auth::user()->username  ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= Auth::user()->firstname  . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Gender</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= Auth::user()->gender ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Birthdate</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= Auth::user()->birthdate ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Year created</label>
                        </div>
                        <div class="col-md-6">
                            <p><?= date('Y',Auth::user()->created_at ) ?></p>
                        </div>
                    </div>
                </div>
                <div style="margin-top : -45px;" class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 style="opacity: 0.3;" class="text-left">Reserved for upcoming features.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
