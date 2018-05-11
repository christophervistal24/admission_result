<!-- Page Content -->
<?php extract($data['info']); ?>
<div class="bg-image bg-image-bottom" style="background-image: url('<?= APP['DOC_ROOT']?>/assets/img/photos/photo13@2x.jpg');">
    <div class="bg-primary-dark-op py-30">
        <div class="content content-full text-center">
            <!-- Avatar -->
            <div class="mb-15">
                <a class="img-link" href="profile">
                    <img id="change_info_img" class="img-avatar img-avatar96 img-avatar-thumb" src="<?= APP['DOC_ROOT'] ?>/assets/img/uploads/<?= $profile; ?>" alt="">
                </a>
            </div>
            <!-- END Avatar -->
            <!-- Personal -->
            <h1 class="h3 text-primary-light font-w700 mb-10 text-capitalize"><?= $firstname . ' ' . substr($middlename,0,1) . '. ' . $lastname; ?></h1>
            <!-- END Personal -->
            <a class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5" href="profile">
                <i class="fa fa-user-o mr-5"></i> Admin
            </a>
            <!-- END Actions -->
        </div>
    </div>
</div>
<div class="content content-full">
    <!-- Images Filtering -->
    <h2 class="content-heading">Profile of<small class="text-capitalize"> <?= $firstname  . ' ' . $lastname ?></small></h2>
    <!-- Project Filtering (.js-filter class is initialized in Codebase() -> uiHelperContentFilter()) -->
    <!-- If data-numbers="true" is added, then the number of the items of each category will be auto added to each category link -->
    <div class="js-filter">
        <!-- Navigation -->
        <div class="p-10 bg-white push">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-category-link="p-info">
                        <i class="fa fa-fw fa-briefcase mr-5"></i> Personal Info.
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-category-link="profile">
                        <i class="fa fa-fw fa-briefcase mr-5"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-category-link="log-info">
                        <i class="fa fa-fw fa-camera mr-5"></i> Login info.
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Navigation -->
        <!-- Projects -->
        <div class="row items-push img-fluid-100">
            <div class="col-sm-6 col-md-3" data-category="profile">
                <p><img class="img-fluid" src="<?= APP['DOC_ROOT'] ?>assets/img/uploads/<?= $profile  ?>" alt=""></p>
            </div>

            <div class="col-sm-6 col-md-3" data-category="p-info">
                <p class="text-capitalize">Fullname : &emsp;<?= $firstname . ' ' . $middlename . '.' . ' ' . $lastname ?></p>
                <p class="text-capitalize">Gender : &emsp;&emsp;<?= $gender ?></p>
                <p class="text-capitalize">Birthdate : &emsp;<?= $birthdate ?></p>
            </div>

            <div class="col-sm-6 col-md-3" data-category="log-info">
                <p class="text-capitalize">Username : &emsp;<?= $username; ?></p>
            </div>
        </div>
    </div>
    <!-- END Project Filtering -->
</div>
<!-- END Page Content -->