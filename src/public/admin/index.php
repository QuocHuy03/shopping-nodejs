<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<div class="row mb-2">
	<div class="col-sm-12">
		<br>

	</div><!-- /.col -->
</div><!-- /.row -->
<?php
include_once '../Layout/config.php';
?>
<?php
$products = pdo_query_one("SELECT COUNT(*) FROM `products`")['COUNT(*)'];
$orders = pdo_query_one("SELECT COUNT(*) FROM `order`")['COUNT(*)'];
$users = pdo_query_one("SELECT COUNT(*) FROM `users`")['COUNT(*)'];
$amount = pdo_query_one("SELECT SUM(`price`) FROM `users`")['SUM(`price`)'];
// $thanhviendangkytrongthang = pdo_query("SELECT * FROM `users` WHERE YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')."  ");
$tongtiennaptrongthang = pdo_query_one("SELECT SUM(`amount`) FROM `bank_auto` WHERE YEAR(create_gettime) = ".date('Y')." AND MONTH(create_gettime) = ".date('m')." ")['SUM(`amount`)'];

?>


<div class="row">
    <div class="col-lg-12">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <button class="btn btn-primary" type="button" data-toggle="modal"
                            data-target="#modal-default">ShopCode</button>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Phiên bản hiện tại: 2030 (Phiên bản cuối cùng của HuyDev)
        </br>Nhằm tăng cường bảo mật, HuyDev khuyên bạn nên thường xuyên thay đổi mật khẩu Admin 7 ngày 1 lần và mật khẩu phải thật phức tạp.
        </div>
        
      
        <div class="row">
            <div class="col-6 col-md-4 text-center">
                

                <div class="knob-label"></div>
            </div>
            <div class="col-6 col-md-4 text-center">
                

                <div class="knob-label"></div>
            </div>
            <div class="col-6 col-md-4 text-center">
                

                <div class="knob-label"></div>
            </div>
            <section class="col-lg-12 connectedSortable pt-5">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 id="total_users"><?= $users ?></h3>
                                <p>Tổng thành viên</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 id="total_money">
                                    <?= number_format($amount) ?>đ
                                </h3>
                                <p>Tổng số dư thành viên</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 id="total_accounts">
                                    <?= $orders ?>
                                </h3>
                                <p>Đơn Hàng</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-store"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3 id="total_sold">
                                    <?=$products?>
                                </h3>
                                <p>Sản Phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
       

         
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền nạp trong tháng</span>
                        <span class="info-box-number">
                            <?= $tongtiennaptrongthang ;?>
                            <small>đ</small>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên đăng ký trong tuần</span>
                        <span class="info-box-number">
                            <?= $dangkytrongtuan ;?>
                            <small>user</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền nạp trong tuần</span>
                        <span class="info-box-number">
                            <?=format_cash(
                            $CMSNT->get_row("SELECT SUM(`amount`) FROM `bank_auto` WHERE WEEK(time, 1) = WEEK(CURDATE(), 1) ")['SUM(`amount`)'] + 
                            $CMSNT->get_row("SELECT SUM(`amount`) FROM `momo` WHERE WEEK(time, 1) = WEEK(CURDATE(), 1) ")['SUM(`amount`)'] +
                            $CMSNT->get_row("SELECT SUM(`thucnhan`) FROM `cards` WHERE `status` = 'thanhcong' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) ")['SUM(`thucnhan`)']
                            
                            );?>
                            <small>đ</small>
                        </span>
                    </div>
                </div>
            </div>





            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Doanh thu bán tài khoản hôm nay</span>
                        <span class="info-box-number"><b id="doanh_thu_ban_tai_khoan_hom_nay">
                                <?=format_cash($CMSNT->get_row("SELECT SUM(`sotien`) FROM `orders` WHERE `thoigian` >= DATE(NOW()) AND `thoigian` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`sotien`)']);?>
                            </b> <small>đ</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-basket"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tài khoản đã bán hôm nay</span>
                        <span class="info-box-number"><b id="tai_khoan_da_ban_hom_nay">
                                <?=format_cash($CMSNT->num_rows("SELECT * FROM `taikhoan` WHERE `thoigianmua` >= DATE(NOW()) AND `thoigianmua` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            </b> <small>nick</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên đăng ký hôm nay</span>
                        <span class="info-box-number">
                            <b id="thanh_vien_dang_ky_hom_nay"><?=format_cash($CMSNT->num_rows("SELECT * FROM `users` WHERE `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            </b><small>user</small>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền nạp hôm nay</span>
                        <span class="info-box-number">
                            <b id="tong_tien_nap_hom_nay"> <?=format_cash(
                            $CMSNT->get_row("SELECT SUM(`amount`) FROM `bank_auto` WHERE `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`amount`)'] + 
                            $CMSNT->get_row("SELECT SUM(`amount`) FROM `momo` WHERE `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`amount`)'] +
                            $CMSNT->get_row("SELECT SUM(`thucnhan`) FROM `cards` WHERE `status` = 'thanhcong' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`thucnhan`)']
                            );?></b>
                            <small>đ</small>
                        </span>
                    </div>
                </div>
            </div>
            </div>
<script>
	$(function() {
		$("#datatable2").DataTable({
			"responsive": false,
			"autoWidth": false,
		});
	});
</script>
<?php include('foot.php'); ?>