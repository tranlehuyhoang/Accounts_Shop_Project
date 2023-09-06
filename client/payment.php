<?php
session_start();
include_once __DIR__ .  '/../classes/invoices.class.php';
$invoices = new invoices();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bill'])) {
    $getinvoices = $invoices->getinvoicesbyid($_GET['bill']);


    if (isset($getinvoices)) {
        if ($getinvoices == '400') {
?>
            <script type="text/javascript">
                window.location.href = "../client/home.php";
            </script>

<?php
        } else {

            $getinvoices1 = $invoices->getinvoicesbyid($_GET['bill']);
            $getinvoices2 = $invoices->getinvoicesbyid($_GET['bill']);
        }
    }
}


?>


<!DOCTYPE html>

<head id="j_idt2">
</head>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- CMSNT.CO | Version 6.2.7 -->

<head id="CMSNTCO">
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <title>Thanh toán hoá đơn</title>
    <meta name="description" content="Cổng thanh toán CMSNT.CO" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="all,follow" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../public/bootstrap.min.css" />
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../public/style.default.css" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <!-- <link rel="stylesheet" href="https://clonesnew.com/public/faces/javax.faces.resource/material/css/style-version=1.0.css" /> -->
    <link rel="stylesheet" href="../public/qr-code.css" />
    <!-- <link rel="stylesheet" href="https://clonesnew.com/public/faces/javax.faces.resource/material/css/qr-code-tablet.css" /> -->
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Cute Alert -->
    <link class="main-stylesheet" href="../public/cute-alert/style.css" rel="stylesheet" type="text/css">
    <script src="../public/cute-alert/cute-alert.js"></script>
    <!-- jQuery -->
    <script src="../public/js/jquery-3.6.0.js"></script>
    <style type="text/css">
        .container-fluid {
            width: 40% !important;
            min-width: 750px !important;
        }

        .info-box {
            min-height: 600px;
        }

        .entry {
            border-bottom: 1px solid #424242;
        }

        .left {
            background-color: #262626;
        }

        .receipt {
            border-bottom: 1px solid #424242
        }
    </style>
</head>

<body>
    <div class="spinner" id="spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div id="page" style="display: none;">
        <nav class="navbar navbar-default hidden-xs">
            <div class="container-fluid" style="padding: 1px;padding: 1px;width: 45%;min-width: 800px;">
                <div class="navbar-header" style="position: relative">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right" style="padding-right: 0px;">
                        <img src="https://clonesnew.com/public/faces/javax.faces.resource/images/hotline.svg" alt="logo-security" width="35" />
                        <span>0355275555</span>
                        <img src="https://clonesnew.com/public/faces/javax.faces.resource/images/email.svg" alt="logo-security" width="35" />
                        <a href="mailto:cuti29200029@gmail.com"><span>cuti29200029@gmail.com</span></a>
                    </div>
                </div>
            </div>

        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 left">
                    <?php
                    if (isset($getinvoices2)) {
                        if ($getinvoices2 && $getinvoices2->num_rows > 0) {
                            $i = 0;
                            while ($resultsa = $getinvoices2->fetch_assoc()) {
                                # code...
                    ?>
                                <div class="info-box">
                                    <div class="receipt">
                                        <img src="../assets/storage/images/logo_dark_H7W.png" width="100%" />
                                    </div>
                                    <div class="entry">
                                        <p><i class="fa fa-university" aria-hidden="true"></i>
                                            <span style="padding-left: 5px;">Ngân Hàng</span>
                                            <br />
                                            <span style="padding-left: 25px;word-break: keep-all;">VTB</span>
                                        </p>
                                    </div>
                                    <div class="entry">
                                        <p><i class="fa fa-credit-card" aria-hidden="true"></i>
                                            <span style="padding-left: 5px;">Số tài khoản</span>
                                            <br />
                                            <b id="copyStk" style="padding-left: 25px;word-break: keep-all;color:greenyellow;">105879492155</b>
                                            <i onclick="copy()" data-clipboard-target="#copyStk" class="fas fa-copy copy"></i>
                                        </p>
                                    </div>
                                    <div class="entry">
                                        <p><i class="fa fa-user" aria-hidden="true"></i>
                                            <span style="padding-left: 5px;">Chủ tài khoản</span>
                                            <br />
                                            <span style="padding-left: 25px;word-break: keep-all;">TRAN LE HOANG GIANG</span>
                                        </p>
                                    </div>
                                    <div class="entry">
                                        <p><i class="fa fa-money" aria-hidden="true"></i>
                                            <span style="padding-left: 5px;">Số tiền cần thanh toán</span>
                                            <br />
                                            <b style="padding-left: 25px;color:aqua;"><?php echo number_format($resultsa['invoices_price']) ?>đ</b>
                                        </p>
                                    </div>
                                    <div class="entry">
                                        <p><i class="fa fa-comment" aria-hidden="true"></i>
                                            <span style="padding-left: 5px;">Nội dung chuyển khoản</span>
                                            <br />
                                            <b id="copyNoiDung" style="padding-left: 25px;word-break: keep-all;color:yellow;"><?php echo $resultsa['invoices_content'] ?></b>
                                            <i onclick="copy()" data-clipboard-target="#copyNoiDung" class="fas fa-copy copy"></i>
                                        </p>
                                    </div>
                                    <div class="entry">
                                        <p><i class="fa fa-barcode" aria-hidden="true"></i>
                                            <span style="padding-left: 5px;">Trạng thái
                                            </span>
                                            <br />
                                            <?php
                                            if ($resultsa['invoices_status'] == 0) {

                                            ?>
                                                <i class="fa fa-spinner fa-spin"></i><span id="status_payment" style="padding-left: 25px;word-break: break-all;">
                                                    Đang chờ thanh toán
                                                </span>
                                            <?php
                                            } else {

                                            ?>
                                                <span id="status_payment" style="padding-left: 25px;word-break: break-all; color: greenyellow;">
                                                    Thanh toán thành công!
                                                </span>
                                            <?php

                                            }
                                            ?>

                                        </p>
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
                <div class="col-xs-12 col-sm-12 col-md-8 right">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="message" id="loginForm">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="qr-code">


                                                <div class="payment-cta">
                                                    <div>
                                                        <h1>Quét mã QR để thanh toán</h1>
                                                    </div>
                                                    <a>Sử dụng <b> App Internet Banking </b> hoặc ứng dụng camera hỗ trợ
                                                        QR code để quét mã</a>
                                                </div>
                                                <?php

                                                if (isset($getinvoices1)) {
                                                    if ($getinvoices1 && $getinvoices1->num_rows > 0) {
                                                        $i = 0;
                                                        while ($resultsss = $getinvoices1->fetch_assoc()) {
                                                            $requestData = [
                                                                'accountNo' => 105879492155,
                                                                'accountName' => 'TRAN LE HOANG GIANG',
                                                                'acqId' => 970415,
                                                                'amount' => $resultsss['invoices_price'],
                                                                'addInfo' => $resultsss['invoices_content'],
                                                                'format' => 'text',
                                                                'template' => 'compact'
                                                            ];

                                                            // URL API
                                                            $apiUrl = 'https://api.vietqr.io/v2/generate';

                                                            // Gửi yêu cầu POST bằng cURL
                                                            $ch = curl_init($apiUrl);
                                                            curl_setopt($ch, CURLOPT_POST, 1);
                                                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
                                                            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                                            $response = curl_exec($ch);
                                                            curl_close($ch);

                                                            if ($response) {
                                                                $responseData = json_decode($response, true);

                                                                // Kiểm tra mã code trong kết quả
                                                                if ($responseData['code'] === '00') {
                                                                    // Lấy đường dẫn ảnh QR code
                                                                    $qrDataURL = $responseData['data']['qrDataURL'];

                                                                    // Hiển thị ảnh QR code
                                                                    echo '<img class="vietqr"   width="100%" src="' . $qrDataURL . '" alt="QR Code">';
                                                                } else {
                                                                    // Xử lý khi không thành công
                                                                    echo 'Không thể tạo QR code.';
                                                                }
                                                            } else {
                                                                // Xử lý khi có lỗi
                                                                $error = error_get_last();
                                                                echo 'Lỗi: ' . $error['message'];
                                                            }
                                                ?>

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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid hidden-xs">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="copyrights text-center">
                        <p style="color: #737373;   font-size: 11pt; font-weight: bold;">
                            <br />
                            Vui lòng thanh toán vào thông tin tài khoản trên để hệ thống xử lý hoá đơn tự động.
                        </p>
                        <a href="https://clonesnew.com/client/invoices">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            <span>Quay Lại</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://clonesnew.com/public/faces/javax.faces.resource/adyen/js/tracking-version=1.2.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- <script src="https://clonesnew.com/public/faces/javax.faces.resource/adyen/js/tether.min.js"></script>
    <script src="https://clonesnew.com/public/faces/javax.faces.resource/adyen/js/bootstrap.min.js"></script>
    <script src="https://clonesnew.com/public/faces/javax.faces.resource/adyen/js/m2.js"></script>
    <script type="text/javascript" src="https://clonesnew.com/public/faces/javax.faces.resource/js/momo.js"></script>
    <script type="text/javascript" src="https://clonesnew.com/public/faces/javax.faces.resource/js/ws.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#page').show();
            $('#spinner').hide();
            $("img.lazy").show().lazyload();
        });
    </script>
    <script type="text/javascript">
        function getStatusInvoice() {
            $.ajax({
                url: "https://clonesnew.com/ajaxs/client/status-invoice.php",
                type: "GET",
                dataType: "JSON",
                data: {
                    trans_id: "UB5913"
                },
                success: function(result) {
                    if (result.return == 1) {
                        setTimeout("location.href = 'https://clonesnew.com/client/invoices';", 1000);
                    }
                    $('#status_payment').html(result.status);
                }
            });
        }
        setInterval(function() {
            $('#status_payment').load(getStatusInvoice());
        }, 5000);
        new ClipboardJS(".copy");

        function copy() {
            cuteToast({
                type: "success",
                message: "Đã sao chép vào bộ nhớ tạm",
                timer: 5000
            });
        }

        // Dữ liệu yêu cầu

        // var requestData = {
        //     accountNo: 113366668888,
        //     accountName: "QUY VAC XIN PHONG CHONG COVID",
        //     acqId: 970415,
        //     amount: 79000,
        //     addInfo: "Ung Ho Quy Vac Xin",
        //     format: "text",
        //     template: "compact"
        // };


        // // URL API
        // var apiUrl = "https://api.vietqr.io/v2/generate";

        // // Gửi yêu cầu POST bằng $.ajax
        // $.ajax({
        //     url: apiUrl,
        //     type: "POST",
        //     data: JSON.stringify(requestData),
        //     contentType: "application/json",
        //     dataType: "json",
        //     success: function(response) {
        //         // Kiểm tra mã code trong kết quả
        //         if (response.code === "00") {
        //             // Lấy đường dẫn ảnh QR code
        //             var qrDataURL = response.data.qrDataURL;

        //             // Hiển thị ảnh QR code
        //             // $("body").append('<img src="' + qrDataURL + '" alt="QR Code">');

        //             var vietqrImg = document.querySelector('.vietqr');

        //             // Thiết lập đường dẫn ảnh cho thuộc tính src
        //             vietqrImg.src = qrDataURL;
        //         } else {
        //             // Xử lý khi không thành công
        //             console.log("Không thể tạo QR code.");
        //         }
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         // Xử lý khi có lỗi
        //         console.log("Lỗi: " + errorThrown);
        //     }
        // });
    </script>
</body>

</html>