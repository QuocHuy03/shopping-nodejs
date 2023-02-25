<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<?php
include_once '../Layout/config.php'; ?>


<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">NHÓM ĐƠN HÀNG</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px">STT</th>
                                <th>UserName</th>
                                <th>Mã</th>
                                <th>Đơn Hàng</th>
                                <th>Thời Gian</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $sql = "SELECT * FROM `order` ORDER BY id_order  limit 0, 1000 ";
                            $request = pdo_query($sql);
                            foreach ($request as $row1) {
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['name_order']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['random_order']; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="detailOrder.php?orders=<?= $row1['random_order']; ?>"><button class="btn btn-primary"><i class="fa fa-search"></i> Chi Tiết</button></a>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['time_order']; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href='delete.php?huyorder=<?= $row1['id_order']; ?>' class="btn btn-default">Delete</a>
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