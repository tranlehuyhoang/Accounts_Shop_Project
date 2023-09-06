<?php
session_start();
include_once __DIR__ .  '/../classes/user.class.php';
include_once __DIR__ .  '/../classes/category.class.php';
include_once __DIR__ .  '/../classes/brand.class.php';
include_once __DIR__ .  '/../classes/product.class.php';
include_once __DIR__ .  '/../classes/invoices.class.php';
$user = new user();
$category = new category();
$brand = new brand();
$product = new product();
$invoices = new invoices();

if (isset($_SESSION['clone_user_id'])) {
    $getuserbyid = $user->getuserbyid($_SESSION['clone_user_id']);
}
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $user->logout();
}


?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CLONESNEW.SITE</title>
    <link rel="canonical" href="../client/home" />
    <meta name="description" content="Liên Hệ Support : 0355275555 Uy Tín - Chất Lượng " />
    <meta name="keywords" content="Liên Hệ Support : 0355275555 Uy Tín - Chất Lượng ">
    <meta name="copyright" content="CMSNT.CO - THIẾT KẾ WEBSITE MMO" />
    <meta name="author" content=" Hòa Nguyễn" />
    <!-- Open Graph data -->
    <meta property="og:title" content="CLONESNEW.SITE">
    <meta property="og:type" content="Website">
    <meta property="og:url" content="http://localhost/">
    <meta property="og:image:alt" content="Liên Hệ Support : 0355275555 Uy Tín - Chất Lượng ">
    <meta property="og:image" content="../assets/storage/images/image_8OK.png">
    <meta property="og:description" content="Liên Hệ Support : 0355275555 Uy Tín - Chất Lượng ">
    <meta property="og:site_name" content="CLONESNEW.SITE">
    <meta property="article:section" content="Liên Hệ Support : 0355275555 Uy Tín - Chất Lượng ">
    <meta property="article:tag" content="Liên Hệ Support : 0355275555 Uy Tín - Chất Lượng ">
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
<!-- Dev By CMSNT.CO | FB.COM/CMSNT.CO | ZALO.ME/0947838128 | MMO Solution -->
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
                            <a target='_blank' href="https://www.facebook.com/cuti292000mmo/" class="svg-icon ">
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
                                                    <span class="badge badge-danger">1</span> </a>
                                                <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="notification-dropdown">
                                                    <div class="card shadow-none m-0 border-0">
                                                        <div class="p-3 card-header-border">
                                                            <h6 class="text-center">
                                                                Notifications </h6>
                                                        </div>
                                                        <div class="card-body overflow-auto card-header-border p-0 card-body-list" style="max-height: 500px;">
                                                            <ul class="dropdown-menu-1 overflow-auto list-style-1 mb-0">
                                                                <li class="dropdown-item-1 float-none p-3">
                                                                    <a href="https://clonesnew.com/client/notification/view/386">
                                                                        <div class="list-item d-flex justify-content-start align-items-start">
                                                                            <div class="avatar">
                                                                                <div class="avatar-img avatar-danger avatar-20">
                                                                                    <i class="far fa-envelope-open"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="list-style-detail ml-2 mr-2">
                                                                                <h6 class="font-weight-bold">Bảo Mật</h6>
                                                                                <p class="m-0">
                                                                                    <small class="text-secondary">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mr-1" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                                            </path>
                                                                                        </svg>
                                                                                        1 năm trước</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <li class="dropdown-item-1 float-none p-3">
                                                                    <a href="https://clonesnew.com/client/notification/view/113">
                                                                        <div class="list-item d-flex justify-content-start align-items-start">
                                                                            <div class="avatar">
                                                                                <div class="avatar-img avatar-danger avatar-20">
                                                                                    <i class="far fa-envelope"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="list-style-detail ml-2 mr-2">
                                                                                <h6 class="font-weight-bold">Bảo Mật</h6>
                                                                                <p class="m-0">
                                                                                    <small class="text-secondary">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mr-1" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                                            </path>
                                                                                        </svg>
                                                                                        1 năm trước</small>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item nav-icon dropdown">
                                                <a href="#" class="nav-item nav-icon dropdown-toggle pr-0 search-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="https://clonesnew.com/public/datum/assets/images/user/1.jpg" class="img-fluid avatar-rounded" alt="user">
                                                    <span class="mb-0 ml-2 user-name"><?php echo  $result['user_username'] ?></span>

                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-01-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                        <a href="https://clonesnew.com/client/profile">Trang cá nhân</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                        <a href="https://clonesnew.com/client/change-password">Thay đổi mật khẩu</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z">
                                                            </path>
                                                        </svg>
                                                        <a href="https://clonesnew.com/client/history">Nhật ký hoạt động</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                                                            </path>
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <a href="https://clonesnew.com/client/dong-tien">Biến động số dư</a>
                                                    </li>
                                                    <li class="dropdown-item d-flex svg-icon">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-04-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                            </path>
                                                        </svg>
                                                        <a href="https://clonesnew.com/client/security">Bảo mật</a>
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