<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<?php
include_once '../Layout/config.php';
if (isset($_POST['submit'])) {
    $namePayment = $_POST['namePayment'];
    $stkPayment = $_POST['stkPayment'];
    $nganhangPayment = $_POST['nganhangPayment'];
    $noidungPayment = $_POST['noidungPayment'];
    $imgPayment = $_POST['imgPayment'];
    if (empty($namePayment) || empty($stkPayment) || empty($nganhangPayment) || empty($noidungPayment) || empty($imgPayment)) {
        echo "<script>alert('Bạn Không Được Để Trống')</script>";
    } else {
        $sql = "INSERT INTO `payment`(namePayment,stkPayment,nganhangPayment,noidungPayment,imgPayment) VALUES ('$namePayment','$stkPayment','$nganhangPayment','$noidungPayment','$imgPayment')";
        $result = pdo_execute($sql);
        echo '<script type="text/javascript">swal("Thành Công","Thêm Thành Công","success");
        setTimeout(function(){ location.href = "" },1000);</script>';
    }
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
                <h3 class="card-title">NHÓM TÀI KHOẢN BANK</h3>
                <div class="text-right">
                    <a type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" class="btn btn-info">TẠO SẢN PHẨM</a>
                </div>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px">STT</th>
                                <th>Tên Payment</th>
                                <th>STK Payment</th>
                                <th>Ngân Hàng Payment</th>
                                <th>Nội Dung Payment</th>
                                <th>Ảnh Payment</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $sql = "SELECT * FROM `payment` ORDER BY id_atm limit 0, 1000 ";
                            $request = pdo_query($sql);
                            foreach ($request as $row1) {
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['namePayment']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['stkPayment']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['nganhangPayment']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $row1['noidungPayment']; ?>
                                    </td>
                                    <td class="text-center">
                                        <img src="<?= $row1['imgPayment']; ?>" alt="" width="200">
                                    </td>

                                    <td class="text-center">
                                        <a href='delete.php?huydeleid=<?= $row1['id_atm']; ?>' class="btn btn-default">Delete</a>
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Tài Khoản</label>
                        <input type="text" class="form-control" name="namePayment" placeholder="Nhập Tên Bank" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số Tài Khoản</label>
                        <input type="text" class="form-control" name="stkPayment" placeholder="Nhập Số Tài Khoản" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngân Hàng</label>
                        <select class="form-control select2bs4" name="nganhangPayment" required>
                            <option value="">Chọn ngân hàng</option>
                            <option value="Vietcombank">Vietcombank</option>
                            <option value="ACB">ACB</option>
                            <option value="MBBank">MBBank</option>
                            <option value="VPBank">VPBank</option>
                            <option value="Techcombank">Techcombank</option>
                            <option value="TPBank">TPBank</option>
                            <option value="VPBank">VPBank</option>
                            <option value="Vietinbank">Vietinbank</option>
                            <option value="Sacombank">Sacombank</option>
                            <option value="THESIEURE">THESIEURE</option>
                            <option value="MOMO">MOMO</option>
                            <option value="Viettelpay">Viettelpay</option>
                            <option value="Zalo Pay">Zalo Pay</option>
                            <option value="Cake">Cake</option>
                            <option value="Shopee Pay">Shopee Pay</option>
                            <option value="MSB">MSB</option>
                            <option value="NamABank">NamABank</option>
                            <option value="LienVietPostBank">LienVietPostBank</option>
                            <option value="VietCapitalBank">VietCapitalBank</option>
                            <option value="BIDV">BIDV</option>
                            <option value="VIB">VIB</option>
                            <option value="HDBank">HDBank</option>
                            <option value="SeABank">SeABank</option>
                            <option value="GPBank">GPBank</option>
                            <option value="PVcomBank">PVcomBank</option>
                            <option value="NCB">NCB</option>
                            <option value="ShinhanBank">ShinhanBank</option>
                            <option value="SCB">SCB</option>
                            <option value="PGBank">PGBank</option>
                            <option value="Agribank">Agribank</option>
                            <option value="SaigonBank">SaigonBank</option>
                            <option value="DongABank">DongABank</option>
                            <option value="BacABank">BacABank</option>
                            <option value="StandardChartered">StandardChartered</option>
                            <option value="Oceanbank">Oceanbank</option>
                            <option value="VRB">VRB</option>
                            <option value="ABBANK">ABBANK</option>
                            <option value="VietABank">VietABank</option>
                            <option value="Eximbank">Eximbank</option>
                            <option value="VietBank">VietBank</option>
                            <option value="IndovinaBank">IndovinaBank</option>
                            <option value="BaoVietBank">BaoVietBank</option>
                            <option value="PublicBank">PublicBank</option>
                            <option value="SHB">SHB</option>
                            <option value="CBBank">CBBank</option>
                            <option value="OCB">OCB</option>
                            <option value="KienLongBank">KienLongBank</option>
                            <option value="CIMB">CIMB</option>
                            <option value="HSBC">HSBC</option>
                            <option value="DBSBank">DBSBank</option>
                            <option value="Nonghyup">Nonghyup</option>
                            <option value="HongLeong">HongLeong</option>
                            <option value="IBK Bank">IBK Bank</option>
                            <option value="Woori">Woori</option>
                            <option value="UnitedOverseas">UnitedOverseas</option>
                            <option value="KookminHN">KookminHN</option>
                            <option value="KookminHCM">KookminHCM</option>
                            <option value="COOPBANK">COOPBANK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội Dung Bank</label>
                        <input type="text" class="form-control" name="noidungPayment" placeholder="Nhập Nội Dung Nạp Tiền" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image Bank</label>
                        <input type="text" class="form-control" name="imgPayment" placeholder="Link Ảnh Bank" required="">
                    </div>
                  
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <button type="submit" name="submit" class="btn btn-primary">Thêm Bank</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<?php include('foot.php'); ?>