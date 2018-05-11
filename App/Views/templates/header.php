<?php ob_start(); ?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>SDSSU (FES) <?= $title ?? '' ?></title>
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= APP['DOC_ROOT'] ?>assets/img/photos/sdssu.png">
    <style type="text/css">
    body{
    overflow-x: hidden;
    }
    </style>
    <!-- <script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!-- <script src ="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
    <!-- <script src="<?= APP['DOC_ROOT'] ?>assets/js/jquery.min.js"></script> -->
    <script src="<?= APP['DOC_ROOT'] ?>assets/js/sweetalert.min.js"></script>
    <link rel   ="stylesheet" href="<?= APP['DOC_ROOT'] ?>assets/js/plugins/select2/select2.min.css">
    <link rel   ="stylesheet" href="<?= APP['DOC_ROOT'] ?>assets/js/plugins/select2/select2-bootstrap.min.css">
    <link rel   ="stylesheet" id="css-main" href="<?= APP['DOC_ROOT'] ?>assets/css/codebase.min.css">
    <link rel   ="stylesheet" href="<?= APP['DOC_ROOT'] ?>assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
</head>
<body>
    <!-- Page Container -->
    <!-- Pop Out Modal -->
    <!-- end of pop out modal -->
    <?php if (isset($_SESSION['id'])): ?>
    <?php
    extract($data['info']);
    ?>
    <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed">
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Overlay Scroll Container -->
            <div id="side-overlay-scroll">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow">
                    <div class="content-header-section align-parent">
                        <!-- Close Side Overlay -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                        <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Side Overlay -->
                        <!-- User Info -->
                        <div class="content-header-item">
                            <a class="img-link mr-5" href="profile">
                                <img class="img-avatar img-avatar32" src="<?= APP['DOC_ROOT'] ?>public/img/avatars/avatar15.jpg" alt="">
                            </a>
                            <a id="side_overlay_name" class="text-capitalize align-middle link-effect text-capitalize text-primary-dark font-w600" href="profile"><?=$lastname . ' , '. $firstname . ' ' . $middlename ?>.</a>
                        </div>
                        <!-- END User Info -->
                    </div>
                </div>
                <!-- END Side Header -->
                <!-- Side Content -->
                <div class="content-side">
                    <div class="block pull-r-l">
                        <div class="block-header bg-body-light">
                            <h3 class="block-title"><i class="fa fa-fw fa-trash font-size-default mr-5"></i>DELETED ADMISSION RESULTS</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content">
                            <ul class="nav-users push">
                                <?php foreach ($deleted_admission_results as $keys => $info): ?>
                                <li>
                                    <i class="fa fa-fw fa-trash"></i> <?= $info['Fullname'] ?>
                                    <div class="d-inline-flex">
                                        <a class="font-w400" href="/system/admin/restore?a_id=<?= urlencode($info['id'])?>">Restore</a>
                                        <a href="/system/admin/permanent_delete?a_id=<?= urlencode($info['id'])?>&e_r_id=<?=urlencode($info['entrace_rating_id'])?>&e_i_id=<?=urlencode($info['examiner_info_id'])?>" class="font-w400 ">P - Delete</a>
                                    </div>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <!-- END Friends -->
                </div>
                <!-- END Side Content -->
            </div>
            <!-- END Side Overlay Scroll Container -->
        </aside>
        <!-- END Side Overlay -->
        <!-- Sidebar -->
        <nav id="sidebar">
            <!-- Sidebar Scroll Container -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                        <div class="content-header-section sidebar-mini-visible-b">
                            <!-- Logo -->
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                            <!-- END Logo -->
                        </div>
                        <!-- END Mini Mode -->
                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->
                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="/system/admin/dashboard">
                                    <span class="font-size-xl text-primary">SDSSU</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->
                    <!-- Side User -->
                    <div class="content-side content-side-full content-side-user px-10 align-parent">
                        <!-- Visible only in mini mode -->
                        <div class="sidebar-mini-visible-b align-v animated fadeIn">
                            <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar15.jpg" alt="">
                        </div>
                        <!-- END Visible only in mini mode -->
                        <!-- Visible only in normal mode -->
                        <div class="sidebar-mini-hidden-b text-center">
                            <a class="img-link " href="profile">
                                <img id="sidebar_img" class="img-fluid img-avatar rounded-circle" src="<?= APP['DOC_ROOT'] . 'assets/img/uploads/' . $profile; ?>" alt="">
                                <!-- <img id="sidebar_img" class="img-avatar" src="<?= APP['DOC_ROOT'] . 'public/assets/uploads/' . $data['user_info']['image']; ?>" alt=""> -->
                            </a>
                            <ul class="list-inline mt-10">
                                <li class="list-inline-item">
                                    <a id="sidebar_name" class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="profile"><?=$lastname . ' , '. $firstname . ' ' . $middlename ?>.</a>
                                </li>
                                <li class="list-inline-item">
                                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                    <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                        <i class="si si-drop"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark" href="logout">
                                        <i class="si si-logout"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Visible only in normal mode -->
                    </div>
                    <!-- END Side User -->
                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <a href="dashboard"><i class="fa fa-dashboard"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                            <a href="profile"><i class="si si-user"></i><span class="sidebar-mini-hide">Profile</span></a>

                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-plus"></i><span class="sidebar-mini-hide">G - Counselors</span></a>
                                <ul>
                                    <li>
                                        <a href="addguidance">Add Guidance Counselor</a>
                                    </li>
                                    <li>
                                        <a  href="list"></i>List of Guidance Counselors</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-plus"></i><span class="sidebar-mini-hide">Add</span></a>
                                <ul>
                                    <li>
                                        <a href="new">Add Admission Result</a>
                                    </li>
                                    <li>
                                        <a href="createnew">Add New User</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-settings"></i><span class="sidebar-mini-hide">Account Settings</span></a>
                                <ul>
                                    <li>
                                        <a href="changeinfo">Personal Information</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- Sidebar Content -->
            </div>
            <!-- END Sidebar Scroll Container -->
        </nav>
        <!-- END Sidebar -->
        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="content-header-section">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-navicon"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <a  class="btn  btn-dual-secondary">
                        <?= date('l jS \of F Y  ',time()); ?>
                        <!-- <i class="fa fa-search"></i> -->
                    </a>
                    <!-- END Open Search Section -->
                    <!-- Layout Options (used just for demonstration) -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <div class="btn-group" role="group">
                        <div class="dropdown-menu" aria-labelledby="page-header-options-dropdown">
                            <h6 class="dropdown-header">Header</h6>
                            <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                            <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                            <div class="d-none d-xl-block">
                                <h6 class="dropdown-header">Main Content</h6>
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="be_layout_api.html">
                                <i class="si si-chemistry"></i> All Options (API)
                            </a>
                        </div>
                    </div>
                    <!-- END Layout Options -->
                    <!-- Color Themes (used just for demonstration) -->
                    <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
                    <div class="btn-group" role="group">
                        <!-- change with import -->
                        <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                            <h6 class="dropdown-header text-center">Color Themes</h6>
                            <div class="row no-gutters text-center mb-5">
                                <div class="col-4 mb-5">
                                    <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-5">
                                    <a class="text-elegance" data-toggle="theme" data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-5">
                                    <a class="text-pulse" data-toggle="theme" data-theme="assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-5">
                                    <a class="text-flat" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-5">
                                    <a class="text-corporate" data-toggle="theme" data-theme="assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-5">
                                    <a class="text-earth" data-toggle="theme" data-theme="assets/css/themes/earth.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_toggle">Sidebar Style</button>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="be_ui_color_themes.html">
                                <i class="fa fa-paint-brush"></i> All Color Themes
                            </a>
                        </div>
                    </div>
                    <!-- END Color Themes -->
                </div>
                <!-- END Left Section -->
                <!-- Right Section -->
                <div class="content-header-section">
                    <!-- User Dropdown -->
                    <div class="btn-group" role="group">
                        <button id="top_right_name" type="button" class="text-capitalize btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?=$lastname . ' , '. $firstname . ' ' . $middlename ?>.
                        <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                            <a class="dropdown-item" href="profile">
                                <i class="si si-user mr-5"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <!-- Toggle Side Overlay -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout">
                                <i class="si si-logout mr-5"></i> Sign Out
                            </a>
                        </div>
                    </div>
                    <!-- END User Dropdown -->
                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                    <i class="fa fa-trash"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->
            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header">
                <div class="content-header content-header-fullrow">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                        </span>
                    </div>
                </div>
            </div>
            <!-- END Header Search -->
            <!-- Header Loader -->
            <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header content-header-fullrow text-center">
                    <div class="content-header-item">
                        <i class="fa fa-sun-o fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="content">
                <?php endif; ?>