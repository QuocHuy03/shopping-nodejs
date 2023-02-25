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
                <h3 class="card-title">NHÓM DANH MỤC</h3>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $sql = "SELECT * FROM `category` ORDER BY id_category  limit 0, 1000 ";
                            $request = pdo_query($sql);
                            foreach ($request as $row1) {
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row1['nameCategory']; ?></td>
                                    </td>
                                    <td>
                                        <a href='editCategory.php?updateid=<?= $row1['id_category']; ?>' class="btn btn-default">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <a href='delete.php?huydeleid=<?= $row1['id_category']; ?>' class="btn btn-default">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
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
<!-- /.row (main row) -->
<!-- /.row huydeV -->
<?php include('foot.php'); ?>
