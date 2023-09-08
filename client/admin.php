<!-- <script>
while (true) {
    var userInput = prompt("Vui lòng nhập otp để tiếp tục:");

    if (userInput === "250819") {

        break; // Kết thúc vòng lặp khi người dùng nhập đúng
    } else {
        alert("Sai opt!");
    }
}
</script> -->
<?php
include_once __DIR__ .  '/../inc/inc.class.php';

// if (isset($_SESSION['clone_user_id'])) {
//     $getuserbyid = $user->getuserbyid($_SESSION['clone_user_id']);
// }
if (isset($_GET['bill']) && isset($_GET['user'])  && isset($_GET['price'])) {
    $update = $invoices->update_invoices($_GET['bill'], $_GET['user'], $_GET['price']);
}
$show_invoices = $invoices->show_invoices();

if (isset($_SESSION['clone_user_id']) && $_SESSION['clone_user_id'] == '6') {
} else {
    header('Location: ../client/home.php');
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADMIN | CLONESNEW.RF.GD</title>
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
        <div style="">
            <div class="">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="header-title">
                                        <h4 class="card-title">Hoá Đơn</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table data-table table-striped mb-0">
                                            <thead class="table-color-heading">
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th>Mã giao dịch</th>
                                                    <th>Phương thức thanh toán</th>
                                                    <th>Số lượng</th>
                                                    <th>Thanh toán</th>
                                                    <th>Trạng thái</th>
                                                    <th>Người mua</th>
                                                    <th>Thời gian</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                if (isset($show_invoices)) {
                                                    if ($show_invoices && $show_invoices->num_rows > 0) {
                                                        $i = 0;
                                                        while ($results = $show_invoices->fetch_assoc()) {
                                                            // echo print_r($results)
                                                ?>

                                                            <tr>
                                                                <td><?php echo $results['invoices_id'] ?></td>
                                                                <td><a href="../client/payment.php?bill=<?php echo $results['invoices_content'] ?>"><i class="fas fa-file-alt"></i>
                                                                        <?php echo $results['invoices_content'] ?></a></td>
                                                                <td><b style="font-size:15px;">VTB</b></td>
                                                                <td><b style="color: red;"><?php echo number_format($results['invoices_price']) ?>đ</b>
                                                                </td>
                                                                <td><b style="color: green;"><?php echo number_format($results['invoices_price']) ?>đ</b>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($results['invoices_status'] == '0') {
                                                                    ?>
                                                                        <p class="mb-0 text-warning font-weight-bold d-flex justify-content-start align-items-center">
                                                                            Đang chờ thanh toán</p>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                                                                            Đã thanh toán</p>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </td>
                                                                <td><?php echo $results['user_username'] ?></td>
                                                                <td><?php echo $results['invoices_date'] ?></td>
                                                                <td><a onclick="return confirm('Xác nhận cập nhật')" href="../client/admin.php?bill=<?php echo $results['invoices_content'] ?>&user=<?php echo $results['invoices_user'] ?>&price=<?php echo $results['invoices_price'] ?>" class="btn btn-primary btn-sm">Xác nhận</a>

                                                                </td>
                                                            </tr>

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


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



    <!-- Wrapper End-->


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


    <!-- Dev By PS26819 | FB.COM/PS26819 | ZALO.ME/0947838128 | MMO Solution -->
    <!-- Script Footer -->
</body>

</html>