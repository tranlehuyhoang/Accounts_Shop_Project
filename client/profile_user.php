<?php

include_once '../inc/header.inc.php';

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
                                            <h3 class="font-600 text-white text-center mb-0"><?php echo $result['user_username'] ?>
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