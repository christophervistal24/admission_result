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
            <a class="btn btn-rounded btn-hero btn-sm btn-alt-primary mb-5" href="changeinfo">
                <i class="fa fa-user-o mr-5"></i> Admin
            </a>
            <!-- END Actions -->
        </div>
    </div>
</div>
<!-- END User Info -->
<!-- Main Content -->
<div class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- Single Chat #3 -->
            <div class="block block-rounded block-themed">
                <!-- Chat Header -->
                <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-dusk text-center font-w600 mt-15 mb-5 text-white">Change Personal Information & Profile picture<br>
                    <small class="text-white">( Please type your password in order to change your information )</small>
                </div>
                <!-- END Chat Header -->
                <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
                <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="3">
                    <form id="changeInformationProfile" action="" method="post">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-firstname">Firstname *</label>
                            <div class="col-lg-8"><input required type="text" class="form-control" id="val-firstname" name="firstname" placeholder="Enter a firstname" value="<?= $firstname ?>"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-middlename">Middlename *</label>
                            <div class="col-lg-8"><input required type="text" class="form-control" id="val-middlename" name="middlename" placeholder="Enter a middlename" value="<?= $middlename ?>"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-lastname">Lastname *</label>
                            <div class="col-lg-8"><input required type="text" class="form-control" id="val-lastname" name="lastname" placeholder="Enter a lastname" value="<?= $lastname ?>"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="example-datepicker1">Birthday *</label>
                            <div class="col-lg-8"><input required type="date" class="js-datepicker form-control" id="example-datepicker1" name="birthday"  value="<?= $birthdate ?>"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-skill">Gender *</label>
                            <div class="col-lg-8">
                                <select required class="form-control" id="val-skill" name="gender">
                                    <option value="female" <?= ($gender =='Female') ? 'selected' : null ; ?>>Female</option>
                                    <option value="male"   <?= ($gender =='Male') ? 'selected' : null ; ?>>Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="val-password">Password *</label>
                            <div class="col-lg-8"><input required type="password" class="form-control" id="val_password" name="password" placeholder=""></div>
                        </div>
                        <input type="hidden" value="change_personal_information" name="action">
                        <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Change information</button></div>
                    </form>
                    <hr>
                    <form id="changeProfile" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="example-file-input-custom">Profile picture <span class="text-danger">*</span></label>
                            <div class="col-lg-8">
                                <input type="file" style="cursor: pointer;" class="custom-file-input" id="example-file-input-custom"  name="profile_picture"> <span class="custom-file-control">Browse</span>
                            </div>
                            <input type="hidden" value="_change_profile" name="action">
                        </div>
                        <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Change profile picture</button></div>
                    </form>
                </div>
            </div>
            <!-- END Single Chat #3 -->
        </div>
        <div class="col-md-6">
            <!-- Single Chat #3 -->
            <div class="block block-rounded block-themed">
                <!-- Chat Header -->
                <div class="js-chat-head block-content block-content-full block-sticky-options bg-gd-dusk text-center font-w600 mt-15 mb-5 text-white">Change Password & Username<br>
                    <small class="text-white">( Don't type your current password to new password field )</small>
                </div>
                <!-- END Chat Header -->
                <!-- Messages (demonstration messages are added with JS code at the bottom of this page) -->
                <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="3">
                    <form id="changePassword" action="" method="post">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="change_new_password">New Password <span class="text-danger">*</span></label>
                            <div class="col-lg-8"><input type="password" class="form-control" id="change_new_password" name="change_new_password" placeholder="Choose a safe one.."></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="change_new_confirm_password">Re-type New Password<span class="text-danger"> *</span></label>
                            <div class="col-lg-8"><input type="password" class="form-control" id="change_new_confirm_password" name="change_new_confirm_password" placeholder="..and confirm it!"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="change_current_password">Current Password <span class="text-danger">*</span></label>
                            <div class="col-lg-8"><input type="password" class="form-control" id="change_current_password" name="change_current_password" placeholder="Your current password"></div>
                        </div>
                        <input type="hidden" value="_password_change" name="action">
                        <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Change password</button></div>
                    </form>
                </div>
                <hr>
                <div class="js-chat-talk block-content block-content-full text-wrap-break-word overflow-y-auto" data-chat-id="3">
                    <form id="changeUsername" action="" method="post">
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="username">New Username<span class="text-danger"> *</span></label>
                            <div class="col-lg-8"><input type="text" class="form-control" id="username" name="username" placeholder="Your new username"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label" for="password">Current Password <span class="text-danger">*</span></label>
                            <div class="col-lg-8"><input type="password" class="form-control" id="password" name="username_password" placeholder="Password is need"></div>
                        </div>
                        <input type="hidden" value="_username_change" name="action">
                        <div class="form-group row col-lg-8 ml-auto"><button type="submit" class="btn btn-alt-primary float-right">Change username</button></div>
                    </form>
                </div>
            </div>
            <!-- END Single Chat #3 -->
        </div>
    </div>
</div>
<!-- END Main Content -->
<!-- END Page Content -->