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
                                <th style="width: 5px;">STT</th>
                                <th>Mã GD</th>
                                <th>Tài Khoản Nạp</th>
                                <th>Số Coin</th>
                                <th>Nội Dung</th>
                                <th>Thời Gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $note = "SELECT * FROM `bank_auto` ORDER BY id limit 0, 1000 ";
                            $request = pdo_query($note);
                            foreach ($request as $row) {
                                $sql = "SELECT * FROM `users` WHERE id_user = '" . $row['user_id'] . "'";
                                $result = pdo_query_one($sql);
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <?= $row['tid'] ?>
                                    </td>
                                    <td>
                                        <?= $result['username'] ?>
                                    </td>
                                    <td>
                                        <?= number_format($row['amount']) ?>
                                    </td>
                                    <td>
                                        <?= $row['description'] ?>
                                    </td>
                                    <td>
                                        <?= $row['create_gettime'] ?>
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