<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<?php
include_once '../Layout/config.php';
?>


<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">NHÓM KHÁCH HÀNG</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nhà Mạng</th>
                                <th>Serial</th>
                                <th>Mã Thẻ</th>
                                <th>Mệnh Giá</th>
                                <th>Số Coin Nhận</th>
                                <th>Thời Gian</th>
                                <th>Lý Do</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $note = "SELECT * FROM `cards` ORDER BY id limit 0, 1000 ";
                            $request = pdo_query($note);
                            foreach ($request as $row) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <?= $row['telco'] ?>
                                    </td>
                                    <td>
                                        <?= $row['serial'] ?>
                                    </td>
                                    <td>
                                        <?= $row['pin'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($row['amount']) ?>
                                    </td>
                                    <td>
                                        <?= number_format($row['price']) ?>
                                    </td>
                                    <td>
                                        <?= $row['create_date'] ?>
                                    </td>
                                    <td>
                                        <?= $row['reason'] ?>
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