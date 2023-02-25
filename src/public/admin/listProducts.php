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
                <h3 class="card-title">NHÓM SẢN PHẨM</h3>
               
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px">STT</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá Chính</th>
                                <th>Giá Cũ</th>
                                <th>Link Download</th>
                                <th>Mô Tả Sản Phẩm</th>
                                <th>Nội Dung Sản Phẩm</th>
                                <th>Danh Mục Sản Phẩm</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $sql = "SELECT * FROM products,category WHERE products.typeProducts = category.codeCategory ORDER BY id_products DESC";
                            //   echo $sql;
                            $request = pdo_query($sql);
                            foreach ($request as $row1) {
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <img style="width:200px" src="<?= $row1['imgProducts'] ?>">
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['nameProducts']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['priceProducts']; ?>
                                    </td>
                                     <td class="text-center">
                                        <?= $row1['discountProducts']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['linkProducts']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['describeProducts']; ?>
                                    </td>
                                      <td class="text-center" style="display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                        <?= $row1['noidungProducts']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['nameCategory']; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href='delete.php?huydeleidt=<?= $row1['id_products']; ?>' class="btn btn-default">Delete</a>
                                    </td>
                                    <td class="text-center">
                                        <a href='editProducts.php?updateid=<?= $row1['id_products']; ?>' class="btn btn-default">Edit</a>
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
