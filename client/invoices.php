<?php
include_once '../inc/header.inc.php';

$show_invoices = $invoices->show_invoices_by_user();
?>
<div style="padding-top:90px">
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert bg-white alert-warning" role="alert">
                        <div class="iq-alert-icon">
                            <i class="ri-alert-line"></i>
                        </div>
                        <div class="iq-alert-text">Mỗi hoá đơn chỉ tồn tại trong 24 tiếng tính từ thời gian tạo,
                            vui lòng thực hiện thanh toán sau khi tạo hoá đơn.</div>
                    </div>
                </div>
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
                                                        <td><a target="_blank" href="../client/payment.php?bill=<?php echo $results['invoices_content'] ?>"><i class="fas fa-file-alt"></i>
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
                                                        <td><?php echo $results['invoices_date'] ?></td>
                                                        <td>
                                                            <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chi tiết hoá đơn" href="../client/payment.php?bill=<?php echo $results['invoices_content'] ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mx-4" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                                    </path>
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                                    </path>
                                                                </svg>
                                                            </a>
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


                                        <tr>
                                            <td>10</td>
                                            <td><a href="https://clonesnew.com/client/payment/NT386019"><i class="fas fa-file-alt"></i>
                                                    NT386019</a></td>
                                            <td><b style="font-size:15px;">VTB</b></td>
                                            <td><b style="color: red;">25.000đ</b></td>
                                            <td><b style="color: green;">25.000đ</b></td>
                                            <td>
                                                <p class="mb-0 text-success font-weight-bold d-flex justify-content-start align-items-center">
                                                    Đã thanh toán</p>
                                            </td>
                                            <td>2023-03-13 22:33:49</td>
                                            <td>
                                                <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chi tiết hoá đơn" href="https://clonesnew.com/client/payment/NT386019">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-secondary mx-4" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
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
                    Version <b style="color: red;">6.2.7</b> | Powered By <a target="_blank" href="../client/home.php">PS26819</a>
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