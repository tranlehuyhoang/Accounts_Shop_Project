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
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

<?php

include_once '../inc/header.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['bill'])) {
    $show_order_by_code = $order->show_order_by_code($_GET['bill']);
    if (isset($show_order_by_code)) {
        if ($show_order_by_code !== '400') {
        } else {
            echo "<script>location.href = '../client/home.php';</script>";
        }
    }
} else {
    echo "<script>location.href = '../client/login.php';</script>";
}

?>
<div style="padding-top:90px">
    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                    $show_order_by_code1 = $order->show_order_by_code($_GET['bill']);
                    if (isset($show_order_by_code1)) {
                        if ($show_order_by_code1 && $show_order_by_code1->num_rows > 0) {
                            $i = 0;
                            while ($results = $show_order_by_code1->fetch_assoc()) {
                                // echo print_r($results)
                    ?>
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng
                        #<?php echo $results['order_code'] ?>
                    </h5>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea id="copyALL" rows="10" class="form-control" readonly>
<?php
$show_product_by_order_code1 = $order->show_product_by_order_code($_GET['bill']);
if (isset($show_product_by_order_code1)) {
    if ($show_product_by_order_code1 && $show_product_by_order_code1->num_rows > 0) {
        $i = 0;
        while ($results = $show_product_by_order_code1->fetch_assoc()) {
            echo "'" . $results['product_data'] . "'\n";
            $i++;
        }
    }
}
?>
</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" onclick="copy()" data-clipboard-target="#copyALL"
                        class="btn btn-primary copy">Sao Chép</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <div class="mb-3">
                        <a href="../client/orders.php" type="button" class="btn btn-danger btn-sm"><i
                                class="fas fa-arrow-left mr-1"></i>Quay Lại</a>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="mb-3">
                        <button class="btn btn-info btn-sm btn-icon-left m-b-10"
                            onclick="downloadFile(`XCGI1694072990`, `ec42f6f670046f4953571f4c2ba2090c`)"
                            type="button"><i class="fas fa-cloud-download-alt mr-1"></i>Tải Về</button>
                        <button class="btn btn-primary btn-sm btn-icon-left m-b-10" data-toggle="modal"
                            data-target="#exampleModal" type="button"><i class="fas fa-copy mr-1"></i>Sao Chép
                            Tất Cả</button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <?php
                                $show_order_by_code2 = $order->show_order_by_code($_GET['bill']);
                                if (isset($show_order_by_code2)) {
                                    if ($show_order_by_code2 && $show_order_by_code2->num_rows > 0) {
                                        $i = 0;
                                        while ($results = $show_order_by_code2->fetch_assoc()) {
                                            // echo print_r($results)
                                ?>
                                <h4 class="card-title">Chi tiết đơn hàng #<?php echo $results['order_code'] ?></h4>


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
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table data-table table-hover mb-0">
                                    <thead class="table-color-heading">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Thông tin tài nguyên</th>
                                            <th width="20%">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $show_product_by_order_code = $order->show_product_by_order_code($_GET['bill']);
                                        if (isset($show_product_by_order_code)) {
                                            if ($show_product_by_order_code && $show_product_by_order_code->num_rows > 0) {
                                                $i = 0;
                                                while ($results = $show_product_by_order_code->fetch_assoc()) {
                                                    // echo print_r($results)
                                        ?>
                                        <td><?php echo $results['product_id'] ?></td>
                                        <td><textarea rows="1" class="form-control"
                                                id="coypy<?php echo $results['product_id'] ?>"
                                                readonly><?php echo $results['product_data'] ?></textarea></td>
                                        <td>
                                            <button type="button" onclick="copy()"
                                                data-clipboard-target="#coypy<?php echo $results['product_id'] ?>"
                                                class="btn btn-danger btn-sm copy"><i class="fas fa-copy mr-1"></i>Sao
                                                Chép</button>
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
                    Version <b style="color: red;">6.2.7</b> | Powered By <a target="_blank"
                        href="https://www.cmsnt.co/?ref=https://clonesnew.com/">CMSNT.CO</a>
                </span>
            </div>
        </div>
    </div>
</footer>

<div class="switch">
    <div class="circle"></div>
</div>



<!-- Backend Bundle JavaScript -->

<!-- Dev By CMSNT.CO | FB.COM/CMSNT.CO | ZALO.ME/0947838128 | MMO Solution -->
<!-- Script Footer -->
</body>

</html>
<script type="text/javascript">
function downloadTXT(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
}

function downloadFile(transid, token) {
    cuteAlert({
        type: "question",
        title: "Xác nhận tải về đơn hàng #" + transid,
        message: "Bạn có chắc chắn muốn tải về hàng này không",
        confirmText: "Đồng Ý",
        cancelText: "Huỷ"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "https://clonesnew.com/ajaxs/client/downloadOrder.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    transid: transid,
                    token: token
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.msg,
                            timer: 5000
                        });
                        downloadTXT(respone.filename, respone.accounts);
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
                    location.reload();
                }
            });
        }
    })
}
</script>



<script>
new ClipboardJS(".copy");

function copy() {
    cuteToast({
        type: "success",
        message: "Đã sao chép vào bộ nhớ tạm",
        timer: 5000
    });
}
</script>