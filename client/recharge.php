<?php
include_once '../inc/header.inc.php';
?>
<div style="padding-top:90px">
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert bg-white alert-primary" role="alert">
                        <div class="iq-alert-icon">
                            <i class="ri-alert-line"></i>
                        </div>
                        <div class="iq-alert-text">
                            <p><strong>Vui l&ograve;ng nhập đ&uacute;ng nội dung CHUYỂN, cộng tiền sau&nbsp;1
                                    ph&uacute;t - 10 ph&uacute;t</strong></p>

                            <p><strong>Nếu nhập sai nội dung sẽ bị trừ&nbsp;10% gi&aacute; trị nạp</strong></p>

                            <p><strong>Nếu hệ thống kh&ocirc;ng cộng tiền sau 10p h&atilde;y li&ecirc;n hệ
                                    Zalo:&nbsp;0866720209 hoặc call 0355275555</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Nạp tiền theo hoá đơn</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-3 mt-3 mt-lg-0 mb-3">
                                    <div type="button" onclick="openModalAmount(5)" class="blur-shadow p-4 shadow-showcase text-center">
                                        <img src="https://clonesnew.com/assets/storage/images/bank/D15.png" width="200px" height="100px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nhập số tiền cần nạp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="hidden" id="token" value="25f78b1021a96a1df271ba06e29ab889" required>
                        <input type="hidden" id="modal-id" required>
                        <input type="number" id="amount" onchange="totalRecharge()" onkeyup="totalRecharge()" placeholder="Nhập số tiền bạn cần nạp vào hệ thống" class="form-control" required>
                    </div>
                    <p>
                        <span class="float-left">Số tiền cần thanh toán<br><br><b id="payment" style="color: blue;">0</b></span>
                        <span class="float-right">Số tiền nhận được<br><br><b id="received" style="color: red;">0</b></span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnDepositOrder" class="btn btn-primary">Tạo hoá đơn</button>
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
    function openModalAmount(id) {
        $("#modal-id").val(id);
        $("#exampleModal").modal();
    }
</script>

<script type="text/javascript">
    new ClipboardJS(".copy");

    function copy() {
        cuteToast({
            type: "success",
            message: "Đã sao chép vào bộ nhớ tạm",
            timer: 5000
        });
    }

    function totalRecharge() {
        $('#total').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');
        $.ajax({
            url: "https://clonesnew.com/ajaxs/client/totalRecharge.php",
            method: "POST",
            data: {
                amount: $("#amount").val(),
                token: $("#token").val(),
            },
            success: function(data) {
                $("#received").html(data);
                $("#payment").html($("#amount").val().toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));
            },
            error: function() {
                cuteToast({
                    type: "error",
                    message: 'Không thể tính kết quả thanh toán',
                    timer: 5000
                });
            }
        });
    }


    $("#btnDepositOrder").on("click", function() {
        $('#btnDepositOrder').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
            'disabled',
            true);
        $.ajax({
            url: "https://clonesnew.com/ajaxs/client/deposit-order.php",
            method: "POST",
            dataType: "JSON",
            data: {
                type: $("#modal-id").val(),
                amount: $("#amount").val(),
                token: $("#token").val()
            },
            success: function(respone) {
                if (respone.status == 'success') {
                    cuteToast({
                        type: "success",
                        message: respone.msg,
                        timer: 5000
                    });
                    //window.open("https://clonesnew.com/client/payment/" + respone.trans_id + " ", '_blank');
                    setTimeout("location.href = 'https://clonesnew.com/client/payment/" + respone
                        .trans_id +
                        " ' ;", 500);

                } else {
                    Swal.fire(
                        'Thất bại',
                        respone.msg,
                        'error'
                    );
                }
                $('#btnDepositOrder').html('Tạo hoá đơn').prop('disabled', false);
            },
            error: function() {
                cuteToast({
                    type: "error",
                    message: 'Không thể xử lý',
                    timer: 5000
                });
                $('#btnDepositOrder').html('Tạo hoá đơn').prop('disabled', false);
            }

        });
    });
</script>