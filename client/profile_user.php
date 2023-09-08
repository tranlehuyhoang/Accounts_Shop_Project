<?php
session_start();
include '../classes/user.class.php';
include '../classes/category.class.php';
include '../classes/brand.class.php';
include '../classes/product.class.php';
include '../classes/invoices.class.php';
include '../classes/order.class.php';
$user = new user();
$category = new category();
$brand = new brand();
$product = new product();
$invoices = new invoices();
$order = new order();

if (isset($_SESSION['clone_user_id'])) {
    $getuserbyid = $user->getuserbyid($_SESSION['clone_user_id']);
}
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $user->logout();
?>
    <script type="text/javascript">
        location.href = '../client/home.php';
    </script>
<?php
}


?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CLONESNEW.SITE</title>
    <link rel="canonical" href="../client/home" />
    <meta name="description" content="Liên Hệ Support : 0337799453 Uy Tín - Chất Lượng " />
    <meta name="keywords" content="Liên Hệ Support : 0337799453 Uy Tín - Chất Lượng ">
    <meta name="copyright" content="PS26819 - THIẾT KẾ WEBSITE MMO" />
    <meta name="author" content=" Huy Hoàng" />
    <!-- Open Graph data -->
    <meta property="og:title" content="CLONESNEW.SITE">
    <meta property="og:type" content="Website">
    <meta property="og:url" content="http://localhost/">
    <meta property="og:image:alt" content="Liên Hệ Support : 0337799453 Uy Tín - Chất Lượng ">
    <meta property="og:image" content="../assets/storage/images/image_8OK.png">
    <meta property="og:description" content="Liên Hệ Support : 0337799453 Uy Tín - Chất Lượng ">
    <meta property="og:site_name" content="CLONESNEW.SITE">
    <meta property="article:section" content="Liên Hệ Support : 0337799453 Uy Tín - Chất Lượng ">
    <meta property="article:tag" content="Liên Hệ Support : 0337799453 Uy Tín - Chất Lượng ">
    <!-- Favicon -->

    <link rel="shortcut icon" href="../assets/storage/images/favicon_V01.ico" type="image/x-icon">
    <link rel="stylesheet" href="../public/datum/assets/css/backend-plugin.min.css">
    <!-- <link rel="stylesheet" href="../public/datum/assets/css/backend.css?v=1.0.0"> -->

    <link rel="stylesheet" href="../resources/css/responsive.css">
    <link rel="stylesheet" href="../resources/css/backend.css?v=1.0.0">
    <link rel="stylesheet" href="../resources/css/customize.css">
    <script src="../resources/js/jquery.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweetalert2-->
    <link class="main-stylesheet" href="../public/sweetalert2/default.css" rel="stylesheet" type="text/css">
    <script src="../public/sweetalert2/sweetalert2.js"></script>
    <!-- Cute Alert -->
    <link class="main-stylesheet" href="../public/cute-alert/style.css" rel="stylesheet" type="text/css">
    <script src="../public/cute-alert/cute-alert.js"></script>
    <!-- jQuery -->
    <script src="../public/js/jquery-3.6.0.js"></script>
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .card-product {
            color: white;
            background-image: linear-gradient(to right, #060606, #060606, #060606);
        }

        #loading-center {
            background: url(../assets/storage/images/gif_loaderPZV.png) no-repeat scroll 50%;
            background-size: 20%;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .change-mode .custom-switch.custom-switch-icon label.custom-control-label:after {
            top: 0;
            left: 0;
            width: 35px;
            height: 30px;
            border-radius: 5px 0 0 5px;
            background-color: #060606;
            border-color: #060606;
            z-index: 0;
        }
    </style>
    <!-- Script Header -->
    <style>
        .iq-sidebar-menu .side-menu li a {
            color: #f1f1f1;
        }

        .text-uppercase {
            color: #f1f1f1;
        }
    </style>
</head>
<!-- Dev By PS26819 | FB.COM/PS26819 | ZALO.ME/0947838128 | MMO Solution -->
<style>
    .iq-sidebar {
        background: linear-gradient(#060606, #060606, #060606);
    }

    .change-mode .custom-switch.custom-switch-icon label.custom-control-label:after {
        top: 0;
        left: 0;
        width: 35px;
        height: 30px;
        border-radius: 5px 0 0 5px;
        background-color: #060606;
        border-color: #060606;
        z-index: 0;
    }
</style>

<body class="color-light ">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="wrapper">
        <div class="iq-sidebar sidebar-default">

            <div class="iq-sidebar-logo d-flex align-items-end justify-content-between">
                <a href="../client/home.php" class="header-logo">
                    <img src="../assets/storage/images/logo_dark_H7W.png" class="img-fluid rounded-normal light-logo" alt="logo">
                    <img src="../assets/storage/images/logo_dark_H7W.png" class="img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
                    <!-- <span>Uy Tín - Chất Lượng</span> -->
                </a>
                <div class="side-menu-bt-sidebar-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

            </div>



            <div class="data-scrollbar" data-scroll="1">
                <nav class="iq-sidebar-menu">

                    <ul id="iq-sidebar-toggle" class="side-menu">
                        <li class="sidebar-layout">
                            <a href="#" class="svg-icon dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Language: <span class="ml-2">
                                    <b>Vietnamese</b>

                                </span>

                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0 border-0">
                                    <div class=" p-0 ">
                                        <ul class="dropdown-menu-1 list-group list-group-flush">
                                            <li onclick="changeLanguage(8)" class="dropdown-item-1 list-group-item px-2"><a class="p-0" href="#" style="color: #8f9fbc;"><img src="../assets/storage/flags/flag_Vietnamese.png" alt="img-flaf" class="img-fluid mr-2" style="width: 30px;height: 20px;min-width: 15px;" />Vietnamese</a>
                                            </li>
                                            <li onclick="changeLanguage(16)" class="dropdown-item-1 list-group-item px-2"><a class="p-0" href="#" style="color: #8f9fbc;"><img src="../assets/storage/flags/flag_English.png" alt="img-flaf" class="img-fluid mr-2" style="width: 30px;height: 20px;min-width: 15px;" />English</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="sidebar-layout">
                            <a href="#" class="svg-icon dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Currency: <span class="ml-2"><b>VND</b></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0 border-0">
                                    <div class=" p-0 ">
                                        <ul class="dropdown-menu-1 list-group list-group-flush">
                                            <li onclick="changeCurrency(1)" class="dropdown-item-1 list-group-item px-2"><a class="p-0" href="#" style="color: #8f9fbc;">VND </a>
                                            </li>
                                            <li onclick="changeCurrency(2)" class="dropdown-item-1 list-group-item px-2"><a class="p-0" href="#" style="color: #8f9fbc;">USD </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="px-3 pt-3 pb-2 ">
                            <span class="text-uppercase small font-weight-bold">Số Dư <span style="color: yellow;">0đ</span> - Giảm: <span style="color: red;">0%</span>
                            </span>
                        </li>
                        <!-- <li class=" sidebar-layout">
                            <a href="https://clonesnew.com/" class="svg-icon">
                                <i class="fas fa-home"></i>
                                <span class="ml-2">Bảng Điều Khiển</span>
                            </a>
                        </li> -->
                        <li class=" sidebar-layout">
                            <a href="../client/home.php" class="svg-icon ">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="ml-2">MUA TÀI KHOẢN</span>
                            </a>
                        </li>
                        <li class=" sidebar-layout">
                            <a href="../client/shop-document.php" class="svg-icon ">
                                <i class="fas fa-book"></i>
                                <span class="ml-2">MUA TÀI LIỆU</span>
                            </a>
                        </li>
                        <li class=" sidebar-layout">
                            <a href="../client/orders.php" class="svg-icon ">
                                <i class="fas fa-history"></i>
                                <span class="ml-2">Lịch Sử Mua Hàng</span>
                            </a>
                        </li>
                        <li class="px-3 pt-3 pb-2 ">
                            <span class="text-uppercase small font-weight-bold">Nạp Tiền</span></span>
                        </li>
                        <li class=" sidebar-layout">
                            <a href="../client/recharge.php" class="svg-icon ">
                                <i class="fas fa-university"></i>
                                <span class="ml-2">Ngân Hàng</span>
                            </a>
                        </li>
                        <li class=" sidebar-layout">
                            <a href="../client/invoices.php" class="svg-icon ">
                                <i class="fas fa-file-invoice"></i>
                                <span class="ml-2">Hoá Đơn</span>
                            </a>
                        </li>
                        <li class="px-3 pt-3 pb-2 ">
                            <span class="text-uppercase small font-weight-bold">Khác</span></span>
                        </li>
                        <li class=" sidebar-layout">
                            <a href="../client/blogs.php" class="svg-icon ">
                                <i class="fa-brands fa-blogger"></i>
                                <span class="ml-2">Bài Viết</span>
                            </a>
                        </li>
                        <li class="sidebar-layout">
                            <a href="#app1" class="svg-icon collapsed" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-toolbox"></i>
                                <span class="ml-2">Công Cụ</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <ul id="app1" class="submenu collapse " data-parent="#iq-sidebar-toggle">
                                <li class=" sidebar-layout ">
                                    <a href="../client/tool-check-live-fb.php" class="svg-icon">
                                        <i class="fab fa-facebook-f"></i><span class="">Check Live Facebook</span>
                                    </a>
                                </li>
                                <li class=" sidebar-layout ">
                                    <a href="../client/ephotor.php" class="svg-icon">
                                        <i class="fas fa-images"></i><span class="">ePhotor</span>
                                    </a>
                                </li>
                                <li class=" sidebar-layout ">
                                    <a href="../client/batchwatermark.php" class="svg-icon">
                                        <i class="fas fa-image"></i><span class="">Chèn Watermark</span>
                                    </a>
                                </li>
                                <li class=" sidebar-layout ">
                                    <a href="../client/icon-facebook.php" class="svg-icon">
                                        <i class="fas fa-smile-wink"></i><span class="">Icon Facebook</span>
                                    </a>
                                </li>
                                <li class=" sidebar-layout ">
                                    <a href="../client/random-face" class="svg-icon">
                                        <i class="fas fa-flushed"></i><span class="">Khuôn Mặt Ngẫu Nhiên</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class=" sidebar-layout">
                            <a target="_blank" href="https://documenter.getpostman.com/view/9826758/TzzANcVu" class="svg-icon ">
                                <i class="far fa-file-code"></i>
                                <span class="ml-2">Tài Liệu API</span>
                            </a>
                        </li>
                        <li class=" sidebar-layout">
                            <a href="../client/contact" class="svg-icon ">
                                <i class="fas fa-address-book"></i>
                                <span class="ml-2">Liên Hệ</span>
                            </a>
                        </li>
                        <li class="sidebar-layout">
                            <a target='_blank' href="https://www.facebook.com/trancoizxcv/" class="svg-icon ">
                                <i class="fab fa-facebook"></i> <span class="ml-2">Liên Hệ Facebook</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="pt-5 pb-5"></div>
            </div>
        </div>


        <?php
        if (isset($getuserbyid)) {
            if ($getuserbyid && $getuserbyid->num_rows > 0) {
                $i = 0;
                while ($result = $getuserbyid->fetch_assoc()) {
                    # code...
        ?>
                    <div class="iq-top-navbar">
                        <div class="iq-navbar-custom">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">
                                <div class="side-menu-bt-sidebar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                    <span class="badge badge2 border border-primary text-primary"><i class="fas fa-wallet mr-1"></i>Ví:
                                        <b><?php echo  number_format($result['user_asset']) ?>đ</b></span>
                                    <!--  -->
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="change-mode">
                                        <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                            <div class="custom-switch-inner">
                                                <p class="mb-0"> </p>
                                                <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                                <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                                    <span class="switch-icon-right">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="h-moon" height="20" width="20" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                    <span class="switch-icon-left">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="h-sun" height="20" width="20" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                        </svg>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                            <li class="nav-item nav-icon dropdown">
                                                <a href="#" class="search-toggle dropdown-toggle" id="notification-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="notification-dropdown">
                                                    <div class="card shadow-none m-0 border-0">
                                                        <div class="p-3 card-header-border">
                                                            <h6 class="text-center">
                                                                Notifications </h6>
                                                        </div>
                                                        <div class="card-body overflow-auto card-header-border p-0 card-body-list" style="max-height: 500px;">
                                                            <ul class="dropdown-menu-1 overflow-auto list-style-1 mb-0">

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item nav-icon dropdown">
                                                <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="../public/datum/assets/images/user/1.jpg" class="img-fluid avatar-rounded" alt="user">
                                                    <span class="mb-0 ml-2 user-name"><?php echo  $result['user_username'] ?></span>

                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-01-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                        <a href="../client/profile_user.php">Trang cá nhân</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                        <a href="../client/change-password.php">Thay đổi mật khẩu</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z">
                                                            </path>
                                                        </svg>
                                                        <a href="../client/history.php">Nhật ký hoạt động</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                                                            </path>
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <a href="../client/dong-tien.php">Biến động số dư</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-04-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                            </path>
                                                        </svg>
                                                        <a href="../client/security.php">Bảo mật</a>
                                                    </li>
                                                    <li class="dropdown-item  d-flex svg-icon border-top">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-05-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                            </path>
                                                        </svg>
                                                        <a href="?action=logout" onclick="return  confirm('Xác nhận đăng xuất')">Đăng xuất</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                <?php
                    $i++;
                }
            } else {
                ?>
            <?php
            }
        } else {
            ?>
            <div class="iq-top-navbar">
                <div class="iq-navbar-custom">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="side-menu-bt-sidebar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span class="badge badge2 border border-primary text-primary"><i class="fas fa-wallet mr-1"></i>Ví:
                                <b>0đ</b></span>
                            <a href="../client/login.php" class="badge border badge2 border-danger text-danger"><i class="fas fa-sign-in-alt mr-1"></i><b>Đăng Nhập</b></a>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="change-mode">
                                <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                    <div class="custom-switch-inner">
                                        <p class="mb-0"> </p>
                                        <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                        <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                            <span class="switch-icon-right">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="h-moon" height="20" width="20" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                                </svg>
                                            </span>
                                            <span class="switch-icon-left">
                                                <svg xmlns="http://www.w3.org/2000/svg" id="h-sun" height="20" width="20" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                    <li class="nav-item nav-icon dropdown">
                                        <a href="#" class="search-toggle dropdown-toggle" id="notification-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="h-6 w-6 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                        </a>
                                        <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="notification-dropdown">
                                            <div class="card shadow-none m-0 border-0">
                                                <div class="p-3 card-header-border">
                                                    <h6 class="text-center">
                                                        Notifications </h6>
                                                </div>
                                                <div class="card-body overflow-auto card-header-border p-0 card-body-list" style="max-height: 500px;">
                                                    <ul class="dropdown-menu-1 overflow-auto list-style-1 mb-0">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="nav-item nav-icon dropdown">
                                        <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="../public/datum/assets/images/user/1.jpg" class="img-fluid avatar-rounded" alt="user">
                                            <span class="mb-0 ml-2 user-name">Bạn chưa đăng nhập</span>

                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                            <li class="dropdown-item d-flex ">
                                                <a href="../client/login.php">Đăng Nhập</a>
                                            </li>
                                            <li class="dropdown-item d-flex ">
                                                <a href="../client/register.php">Đăng Ký</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        <?php
        }
        ?>



        <script>
            function changeLanguage(id) {
                $.ajax({
                    url: "../ajaxs/client/changeLanguage.php",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(respone) {
                        if (respone.status == 'success') {
                            cuteToast({
                                type: "success",
                                message: respone.msg,
                                timer: 5000
                            });
                            location.reload();
                        } else {
                            cuteAlert({
                                type: "error",
                                title: "Error",
                                message: respone.msg,
                                buttonText: "Okay"
                            });
                        }
                    },
                    error: function() {
                        alert(html(response));
                        history.back();
                    }
                });
            }
        </script>
        <script>
            function changeCurrency(id) {
                $.ajax({
                    url: "../ajaxs/client/changeCurrency.php",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id: id
                    },
                    success: function(respone) {
                        if (respone.status == 'success') {
                            cuteToast({
                                type: "success",
                                message: respone.msg,
                                timer: 5000
                            });
                            location.reload();
                        } else {
                            cuteAlert({
                                type: "error",
                                title: "Error",
                                message: respone.msg,
                                buttonText: "Okay"
                            });
                        }
                    },
                    error: function() {
                        alert(html(response));
                        history.back();
                    }
                });
            }
        </script>

        <?php



        if (!isset($_SESSION['clone_user_id'])) {
            echo "<script>location.href = '../client/login.php';</script>";
        }

        if (isset($_SESSION['clone_user_id'])) {
            $getuserbyid = $user->getuserbyid($_SESSION['clone_user_id']);
            $getuserbyid1 = $user->getuserbyid($_SESSION['clone_user_id']);

            $show_invoices = $invoices->count_invoices_by_user();

            $show_order_by_user = $order->show_order_by_user();
        }
        ?>
        <div style="padding-top:90px">
            <div class="content-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <?php

                            if (isset($getuserbyid)) {
                                if ($getuserbyid && $getuserbyid->num_rows > 0) {
                                    $i = 0;
                                    while ($result = $getuserbyid->fetch_assoc()) {
                                        // echo print_r($results)
                            ?>
                                        <div class="card card-block p-card">
                                            <div class="profile-box">
                                                <div class="profile-card rounded">
                                                    <img src="../public/datum/assets/images/user/1.jpg" alt="profile-bg" class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                                                    <h3 class="font-600 text-white text-center mb-0">
                                                        <?php echo $result['user_username'] ?>
                                                    </h3>
                                                    <p class="text-white text-center mb-5">
                                                        <?php echo number_format($result['user_asset']) ?>đ</p>
                                                </div>
                                                <div class="pro-content rounded">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="p-icon mr-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                                                            </svg>
                                                        </div>
                                                        <p class="mb-0 eml"><?php echo $result['user_email'] ?></p>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="p-icon mr-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                                                            </svg>
                                                        </div>
                                                        <p class="mb-0"></p>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <div class="p-icon mr-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" width="24" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <p class="mb-0">Đang tắt bảo mật</p>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="social-ic d-inline-flex rounded">
                                                            <a href="#">
                                                                <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0)">
                                                                        <path d="M341.269 85.0133H388.011V3.60533C379.947 2.496 352.213 0 319.915 0C252.523 0 206.357 42.3893 206.357 120.299V192H131.989V283.008H206.357V512H297.536V283.029H368.896L380.224 192.021H297.515V129.323C297.536 103.019 304.619 85.0133 341.269 85.0133V85.0133Z" fill="black" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="512" height="512" fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </a>
                                                            <a href="#">
                                                                <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g>
                                                                        <path d="M459.392 151.744C480.213 136.96 497.728 118.507 512 97.2587V97.2373C492.949 105.579 472.683 111.125 451.52 113.813C473.28 100.821 489.899 80.4053 497.707 55.808C477.419 67.904 455.019 76.4373 431.147 81.216C411.883 60.6933 384.427 48 354.475 48C296.363 48 249.579 95.168 249.579 152.981C249.579 161.301 250.283 169.301 252.011 176.917C164.757 172.651 87.5307 130.837 35.648 67.1147C26.6027 82.8373 21.2693 100.821 21.2693 120.171C21.2693 156.523 39.9787 188.736 67.904 207.403C51.0293 207.083 34.496 202.176 20.48 194.475V195.627C20.48 246.635 56.8533 289.003 104.576 298.773C96.0213 301.12 86.72 302.229 77.056 302.229C70.336 302.229 63.552 301.845 57.1947 300.437C70.784 341.995 109.397 372.565 155.264 373.568C119.552 401.493 74.1973 418.325 25.1093 418.325C16.512 418.325 8.256 417.941 0 416.896C46.5067 446.869 101.589 464 161.024 464C346.261 464 466.987 309.461 459.392 151.744V151.744Z" fill="black" />
                                                                    </g>
                                                                </svg>
                                                            </a>
                                                            <a href="#">
                                                                <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0)">
                                                                        <path d="M500.672 126.485L501.312 130.666C495.125 108.714 478.421 91.7756 457.195 85.6103L456.747 85.5036C416.832 74.6663 256.213 74.6663 256.213 74.6663C256.213 74.6663 95.9999 74.453 55.6799 85.5036C34.0479 91.7756 17.3226 108.714 11.2426 130.218L11.1359 130.666C-3.77607 208.554 -3.88274 302.144 11.7973 385.536L11.1359 381.312C17.3226 403.264 34.0266 420.202 55.2533 426.368L55.7013 426.474C95.5733 437.333 256.235 437.333 256.235 437.333C256.235 437.333 416.427 437.333 456.768 426.474C478.421 420.202 495.147 403.264 501.227 381.76L501.333 381.312C508.117 345.088 512 303.402 512 260.821C512 259.264 512 257.685 511.979 256.106C512 254.656 512 252.928 512 251.2C512 208.597 508.117 166.912 500.672 126.485V126.485ZM204.971 333.888V178.304L338.645 256.213L204.971 333.888Z" fill="black" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="512" height="512" fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </a>
                                                            <a href="#">
                                                                <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0)">
                                                                        <path d="M262.955 0C122.603 0.0213333 48 89.9413 48 187.989C48 233.451 73.408 290.176 114.091 308.16C125.696 313.387 124.16 307.008 134.144 268.821C134.933 265.643 134.528 262.891 131.968 259.925C73.8133 192.661 120.619 54.3787 254.656 54.3787C448.64 54.3787 412.395 322.795 288.405 322.795C256.448 322.795 232.64 297.707 240.171 266.667C249.301 229.696 267.179 189.952 267.179 163.307C267.179 96.1493 167.125 106.112 167.125 195.093C167.125 222.592 176.853 241.152 176.853 241.152C176.853 241.152 144.661 371.2 138.688 395.499C128.576 436.629 140.053 503.211 141.056 508.949C141.675 512.107 145.216 513.109 147.2 510.507C150.379 506.347 189.291 450.837 200.192 410.709C204.16 396.096 220.437 336.789 220.437 336.789C231.168 356.16 262.101 372.373 295.061 372.373C393.109 372.373 463.979 286.187 463.979 179.243C463.637 76.7147 375.893 0 262.955 0V0Z" fill="black" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath>
                                                                            <rect width="512" height="512" fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $i++;
                                    }
                                } else {
                                    ?>
                                <?php
                                }
                            } else {
                                ?>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="col-lg-8">
                            <div class="row">
                                <?php

                                if (isset($show_invoices)) {
                                    if ($show_invoices && $show_invoices->num_rows > 0) {
                                        $i = 0;
                                        while ($result = $show_invoices->fetch_assoc()) {
                                            // print_r($result);
                                            // echo print_r($results)
                                ?>
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="card card-block card-stretch card-height">
                                                    <div class="card-body text-center">
                                                        <h2 class="mb-2 mt-3 text-primary">
                                                            <?php echo number_format($result['total_amount']) ?>đ
                                                        </h2>
                                                        <h4>Tổng Tiền Nạp</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                    <?php
                                    }
                                } else {
                                    ?>
                                <?php
                                }
                                ?>
                                <?php

                                if (isset($show_order_by_user)) {
                                    if ($show_order_by_user && $show_order_by_user->num_rows > 0) {
                                        $i = 0;
                                        while ($resultsss = $show_order_by_user->fetch_assoc()) {
                                            // print_r($result);
                                            // echo print_r($results)
                                ?>
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="card card-block card-stretch card-height">
                                                    <div class="card-body text-center">
                                                        <h2 class="mb-2 mt-3 text-success">
                                                            <?php echo number_format($resultsss['total_amount']) ?>đ</h2>
                                                        <h4>Số Dư Sử Dụng</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                    <?php
                                    }
                                } else {
                                    ?>
                                <?php
                                }
                                ?>
                                <?php

                                if (isset($getuserbyid1)) {
                                    if ($getuserbyid1 && $getuserbyid1->num_rows > 0) {
                                        $i = 0;
                                        while ($result = $getuserbyid1->fetch_assoc()) {
                                            // echo print_r($results)
                                ?>
                                            <div class="col-sm-4 col-lg-4">
                                                <div class="card card-block card-stretch card-height">
                                                    <div class="card-body text-center">
                                                        <h2 class="mb-2 mt-3 text-warning">
                                                            <?php echo number_format($result['user_asset']) ?>đ</h2>
                                                        <h4>Số Dư Hiện Tại</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                    <?php
                                    }
                                } else {
                                    ?>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="card card-block">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <div class="header-title">
                                        <h4 class="card-title mb-0">Thông Tin Cá Nhân</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Họ và Tên</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" id="fullname" class="form-control" placeholder="Nhập họ và tên" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">Tên đăng nhập</span>
                                        </label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="hidden" id="token" value="ec42f6f670046f4953571f4c2ba2090c" />
                                            <input type="text" class="form-control" value="2508roblox" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Số điện
                                            thoại</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" id="phone" class="form-control" placeholder="Nhập số điện thoại" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Địa chỉ Email
                                            (*)</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="email" id="email" class="form-control" placeholder="Nhập địa chỉ Email" value="2509roblox@gmail.com" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">Thời gian đăng ký</span>
                                        </label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" class="form-control" value="2022-06-06 13:07:49" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                                            <span class="required">Đăng nhập gần đây</span>
                                        </label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" class="form-control" value="2022-06-06 13:07:49" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnSaveProfile" class="btn btn-primary">Lưu Thay
                                        Đổi</button>
                                    <a type="button" href="https://clonesnew.com/" class="btn btn-danger">Đóng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>



    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="https://clonesnew.com/client/privacy-policy">Chính sách
                                bảo mật</a></li>
                        <li class="list-inline-item"><a href="https://clonesnew.com/client/terms">Điều khoản sử dụng</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="mr-1">
                        <!-- Copyright                    <script>
                    document.write(new Date().getFullYear())
                    </script>© <a href="#" class="">CLONESNEW.COM</a>
                    All Rights Reserved |  -->
                        Version <b style="color: red;">6.2.7</b> | Powered By <a target="_blank" href="https://www.cmsnt.co/?ref=https://clonesnew.com/">CMSNT.CO</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <div class="switch">
        <div class="circle"></div>
    </div>



    <!-- Backend Bundle JavaScript -->
    <script src="../public/datum/assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../public/datum/assets/js/customizer.js"></script>
    <script src="../public/datum/assets/js/sidebar.js"></script>
    <!-- Flextree Javascript-->
    <script src="../public/datum/assets/js/flex-tree.min.js"></script>
    <script src="../public/datum/assets/js/tree.js"></script>
    <!-- Table Treeview JavaScript -->
    <script src="../public/datum/assets/js/table-treeview.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="../public/datum/assets/js/sweetalert.js"></script>
    <!-- Vectoe Map JavaScript -->
    <script src="../public/datum/assets/js/vector-map-custom.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../public/datum/assets/js/chart-custom.js"></script>
    <script src="../public/datum/assets/js/charts/01.js"></script>
    <script src="../public/datum/assets/js/charts/02.js"></script>
    <!-- slider JavaScript -->
    <script src="../public/datum/assets/js/slider.js"></script>
    <!-- Emoji picker -->
    <script src="../public/datum/assets/vendor/emoji-picker-element/index.js" type="module"></script>
    <!-- app JavaScript -->
    <script src="../public/datum/assets/js/app.js"></script>


    <!-- Dev By CMSNT.CO | FB.COM/CMSNT.CO | ZALO.ME/0947838128 | MMO Solution -->
    <!-- Script Footer -->
</body>

</html>
<script type="text/javascript">
    $("#btnSaveProfile").on("click", function() {
        $('#btnSaveProfile').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
            true);
        $.ajax({
            url: "https://clonesnew.com/ajaxs/client/profile.php",
            method: "POST",
            dataType: "JSON",
            data: {
                action: 'ChangeProfile',
                token: $("#token").val(),
                fullname: $("#fullname").val(),
                phone: $("#phone").val(),
                email: $("#email").val()
            },
            success: function(respone) {
                if (respone.status == 'success') {
                    cuteToast({
                        type: "success",
                        message: respone.msg,
                        timer: 5000
                    });
                } else {
                    cuteToast({
                        type: "error",
                        message: respone.msg,
                        timer: 5000
                    });
                }
                $('#btnSaveProfile').html('Lưu Thay Đổi').prop('disabled', false);
            },
            error: function() {
                cuteToast({
                    type: "error",
                    message: 'Không thể xử lý',
                    timer: 5000
                });
                $('#btnSaveProfile').html('Lưu Thay Đổi').prop('disabled', false);
            }
        });
    });
</script>