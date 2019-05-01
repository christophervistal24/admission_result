<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SDSSU (ARS) | <?= $title ?? '' ?></title>
        <link rel="shortcut icon" href="<?= APP['DOC_ROOT'] ?>assets/img/photos/sdssu.png">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="<?= APP['DOC_ROOT'] ?>assets/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?= APP['DOC_ROOT'] ?>assets/vendor/datatables/dataTables.bootstrap4.min.css">
        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="<?= APP['DOC_ROOT'] ?>assets/css/sb-admin-2.min.css">
        <style>
        .bg-login-image {
        background:url(<?= APP['DOC_ROOT'] ?>assets/img/backgrounds/undraw_authentication_fsn5.svg) center right;
        background-size: cover;
        }
        </style>
    </head>
    <body id="page-top">
        <?php if (Auth::hasLogin()): ?>
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15">
                      <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SDSSU (ARS)</div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item">
                    <a class="nav-link" href="/system/admin/index">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span class="font-weight-bold">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/system/profile">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span class="font-weight-bold">Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-table"></i>
                        <span class="font-weight-bold">Guidance Counselors</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/system/guidance/create">Add new</a>
                            <a class="collapse-item" href="/system/guidance/index">List</a>
                        </div>
                    </div>
                 </li>
                        
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="fas fa-fw fa-address-book"></i>
                        <span class="font-weight-bold">Admission Result</span>
                    </a>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/system/admission/create">Add new</a>
                        </div>
                    </div>
                </li>

                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userCollapse" aria-expanded="true" aria-controls="userCollapse">
                        <i class="fas fa-fw fa-address-book"></i>
                        <span class="font-weight-bold">Users</span>
                    </a>
                    <div id="userCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="/system/user">List</a>
                        </div>
                    </div>
                </li>

                            <hr class="sidebar-divider d-none d-md-block">
                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>
                        </ul>
                        <!-- End of Sidebar -->
                        <!-- Content Wrapper -->
                        <div id="content-wrapper" class="d-flex flex-column">
                            <!-- Main Content -->
                            <div id="content">
                                <!-- Topbar -->
                                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                                    <!-- Sidebar Toggle (Topbar) -->
                                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                    </button>
                                    <!-- Topbar Search -->
                                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group">
                                            
                                        </div>
                                    </form>
                                    <!-- Topbar Navbar -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                        <li class="nav-item dropdown no-arrow d-sm-none">
                                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-search fa-fw"></i>
                                            </a>
                                            <!-- Dropdown - Messages -->
                                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                                <form class="form-inline mr-auto w-100 navbar-search">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button">
                                                            <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                        
                                        <div class="topbar-divider d-none d-sm-block"></div>
                                        <!-- Nav Item - User Information -->
                                        <li class="nav-item dropdown no-arrow">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize">
                                                    <?=
                                                    Auth::user()->lastname . " , " .
                                                    Auth::user()->firstname . " " .
                                                    substr(Auth::user()->middlename, 0,1) . "."
                                                    ?>
                                                </span>
                                                <img class="img-profile rounded-circle" src="<?= APP['DOC_ROOT'] . '/assets/img/uploads/' . Auth::user()->profile ?>">
                                            </a>
                                            <!-- Dropdown - User Information -->
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <a class="dropdown-item" href="/system/profile/edit">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Account Settings
                                                </a>
                                                <a class="dropdown-item" href="/system/user/create">
                                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Add new user
                                                </a>
                                                <a class="dropdown-item" href="">
                                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Activity Log
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Logout
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- End of Topbar -->
                                <?php endif ?>
