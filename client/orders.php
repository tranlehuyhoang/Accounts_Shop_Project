<?php

include_once '../inc/header.inc.php';
$order1 = new order();

if (!isset($_SESSION['clone_user_id'])) {
    echo "<script>location.href = '../client/login.php';</script>";
}
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
                            <p>Thay đổi th&ocirc;ng b&aacute;o lịch sử đơn h&agrave;ng trong <strong>C&agrave;i
                                    Đặt -&gt;&nbsp;Ghi ch&uacute; lịch sử đơn h&agrave;ng</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-left">
                    <div class="mb-3">
                        <a href="" type="button" class="btn btn-danger btn-sm"><i
                                class="fas fa-arrow-left mr-1"></i>Quay Lại</a>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <!-- <div class="mb-3">
                    <button class="btn btn-primary btn-sm btn-icon-left m-b-10" data-toggle="modal"
                        data-target="#modal-default" type="button"><i
                            class="fas fa-cloud-download-alt mr-1"></i>Tải Về File Backup VIA</button>
                </div> -->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Lịch Sử Mua Hàng</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table data-table table-hover mb-0">
                                    <thead class="table-color-heading">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Mã giao dịch</th>
                                            <th>Sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Thanh toán</th>
                                            <th>Thời gian</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $show_order1 = $order1->show_order();
                                        if (isset($show_order1)) {
                                            if ($show_order1 && $show_order1->num_rows > 0) {
                                                $i = 0;
                                                while ($results = $show_order1->fetch_assoc()) {
                                                    // echo print_r($results)
                                        ?>
                                        <tr class="even">
                                            <td><?php echo $results['order_id'] ?></td>
                                            <td><?php echo $results['order_code'] ?></td>
                                            <td><b><?php echo $results['brand_name'] ?></b></td>
                                            <td><b style="color:blue;"><?php echo $results['order_amout'] ?></b></td>
                                            <td><b
                                                    style="color:red;"><?php echo number_format($results['order_amout'] * $results['order_price']) ?>đ</b>
                                            </td>
                                            <td><i><?php echo $results['order_date'] ?></i></td>
                                            <td><a type="button"
                                                    href="../client/orders_detail.php?bill=<?php echo $results['order_code'] ?>"
                                                    class="btn btn-primary btn-sm">Xem Thêm</a>
                                                <button type="button" onclick="downloadFile('<?php echo $results['order_code']; ?>',`
<?php
                                                    $show_product_by_order_code1 = $order->show_product_by_order_code($results['order_code']);
                                                    if (isset($show_product_by_order_code1)) {
                                                        if ($show_product_by_order_code1 && $show_product_by_order_code1->num_rows > 0) {
                                                            $i = 0;
                                                            while ($resultss = $show_product_by_order_code1->fetch_assoc()) {
?>
'<?php echo $resultss['product_data']; ?>'
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
?>`)" class="btn btn-danger btn-sm">Tải Về</button>
                                                <button type="button"
                                                    onclick="RemoveRow(51630, `0fa5978762a28811e77eb369d275de0b`, `PCLA1693978818`)"
                                                    class="btn btn-warning btn-sm">Xoá</button>
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

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tải Về File Backup VIA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>UID VIA</label>
                            <input type="text" id="uid_via" class="form-control"
                                placeholder="Nhập UID VIA cần tải về file backup">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        <button type="button" onclick="downloadBackup()" class="btn btn-primary">Tải Về</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
</div>



<!-- Wrapper End-->
<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a>Chính sách
                            bảo mật</a></li>
                    <li class="list-inline-item"><a>Điều khoản sử dụng</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                <span class="mr-1">
                    <!-- Copyright                    <script>
                    document.write(new Date().getFullYear())
                    </script>© <a href="#" class="">CLONESNEW.SITE</a>
                    All Rights Reserved |  -->
                    Version <b style="color: red;">6.2.7</b> | Powered By <a target="_blank"
                        href="../client/home.php">PS26819</a>
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

<!-- Dev By PS26819 | FB.COM/PS26819 | ZALO.ME/0947838128 | MMO Solution -->
<!-- Script Footer -->
</body>

</html>
<script type="text/javascript">
function downloadFile(transid, token) {
    function downloadTxtFile(a, b) {
        var content = b;
        var filename = a + ".txt";
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(content));
        element.setAttribute('download', filename);
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);
    }



    function confirmDownload(transid, token) {
        cuteAlert({
            type: "question",
            title: "Xác nhận tải về đơn hàng #" + transid,
            message: "Bạn có chắc chắn muốn tải về hàng này không",
            confirmText: "Đồng Ý",
            cancelText: "Huỷ"
        }).then((e) => {
            console.log(e)

            if (e) {
                downloadTxtFile(transid, token);
            }
        });
    }
    confirmDownload(transid, token)
}

function downloadBackup() {
    if ($("#uid_via").val() == '') {
        return cuteAlert({
            type: "error",
            title: "Error",
            message: "Vui lòng nhập UID cần tải",
            buttonText: "Okay"
        });
    }
    window.open('https://clonesnew.com/assets/storage/backup/' + $("#uid_via").val() + '.zip', '_blank').focus();
}

function RemoveRow(id, token, transid) {
    cuteAlert({
        type: "question",
        title: "Xác nhận xoá đơn hàng #" + transid,
        message: "Bạn có chắc chắn muốn xóa đơn hàng này không ?",
        confirmText: "Đồng Ý",
        cancelText: "Huỷ"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "https://clonesnew.com/ajaxs/client/removeOrder.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    token: token
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

            });
        }
    })
}

function downloadTXT(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
}
</script>