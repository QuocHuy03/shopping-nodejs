<?php include('head.php'); ?>
<?php include('nav.php'); ?>
<?php
include_once '../Layout/config.php';

if (isset($_GET['orders'])) {
    $code = $_GET['orders'];
    $row = pdo_query_one("SELECT * FROM `order` WHERE `random_order` = '$code'");
    $json = $row['dh_order'];
}

?>

<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">CHI TIẾT ĐƠN HÀNG</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px">STT</th>
                                <th>Ảnh Đơn Hàng</th>
                                <th>Tên Đơn Hàng</th>
                                <th>Giá Đơn Hàng</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $i = 0;
                                $huydev = json_decode($json);
                                foreach ($huydev as $rows) {
                                    $sql = "SELECT * FROM `products` WHERE `id_products` = '{$rows->id}'";
                                    $result = pdo_query_one($sql);
                                    $i++;
                                ?>
                                <tr>
                                        <td><?= $i ?></td>
                                        <td><img src="<?= $rows->imgProducts  ?>" alt="" style="width:150px"></td>
                                        <td><?= $rows->nameProducts ?></td>
                                        <td><?= number_format($rows->priceProducts) ?>đ</td>
                                        <td>
                                            <div class="btn-group shadow" role="group"><a href="<?= $result['linkProducts'] ?>" target="_blank" class="btn btn-success fw-bold">Tải Xuống</a>
                                                <a href="/" class="btn btn-warning text-dark fw-bold">Quay Đầu</a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                VUI LÒNG THAO TÁC CẨN THẬN
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row huydeV -->


<?php include('foot.php'); ?>