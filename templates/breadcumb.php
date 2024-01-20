<?php 
$current_page = "";
$current_action = "";
if ($_GET['page'] == 'dashboard') {
    $current_page = "Dashboard";
} else if ($_GET['page'] == 'mobil') {
    $current_page = "Mobil";
} else if ($_GET['page'] == 'pelanggan') {
    $current_page = "Pelanggan";
} else {
    $current_page = "Rental";
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'edit') {
        $current_action = "Edit " . $current_page;
    }
    else if ($_GET['action'] == 'create') {
        $current_action = "Tambah " . $current_page;
    }
} else {
    if ($_GET['page'] == 'dashboard') {
        $current_action = "Dashboard";
    } else {
        $current_action = "Manajemen " . $current_page;
    }
}
?>
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Rental</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $current_page ?></li>
            </ol>
            <h6 class="font-weight-bolder mb-0"><?= $current_action ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav justify-content-end ms-md-auto pe-md-3 d-flex align-items-center">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none"> 
                            <?= $_SESSION['nama_lengkap'] . "(" . ucfirst($_SESSION['level']) .")"; ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item border-radius-md" href="../logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
                </li>
            </ul>
        </div>
    </div>
</nav>