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
                <h3 class="card-title">NHÓM KHÁCH HÀNG</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px">STT</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Price User</th>
                                <th>Thống Kê</th>
                                <th>Thời Gian</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $note = "SELECT * FROM `users` ORDER BY id_user limit 0, 1000 ";
                            $request = pdo_query($note);
                            foreach ($request as $row1) {
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['email']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['username']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['password']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= number_format($row1['price']) ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['role']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['time_user']; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href='delete.php?huydevKh=<?= $row1['id_user']; ?>' class="btn btn-default">Delete</a>
                                    </td>
                                    <td class="text-center">
                                        <a href='edit-users.php?updateid=<?= $row1['id_user']; ?>' class="btn btn-default">Edit</a>
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