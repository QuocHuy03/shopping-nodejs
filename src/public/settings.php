<?php require_once('head.php');?>
<?php require_once('nav.php');?>
<?php
    if (isset($_POST["submit"]))
    {
      $create = pdo_execute("UPDATE `setting` SET
        `site_domain` = '".$_POST['site_domain']."',
        `site_logo` = '".$_POST['site_logo']."',
        `facebook` = '".$_POST['facebook']."',
        `sdt_admin` = '".$_POST['sdt_admin']."',
        `site_tenweb` = '".$_POST['site_tenweb']."',
        `site_email` = '".$_POST['email_smtp']."',
        `site_passemail` = '".$_POST['pass_email_smtp']."',
        `token_tele` = '".$_POST['token_tele']."',
        `chatID_tele` = '".$_POST['chatID_tele']."',
        `site_content` = '".$_POST['site_content']."' ");
        echo '<script type="text/javascript">alert("Luu Thanh Cong");
        setTimeout(function(){ location.href = "/admin/settings.php" },1000);</script>';
    }

?>
<div class="row mb-2">
    <div class="col-sm-6">

    </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                <section class="col-lg-12">
                    <div class="card card-dark card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">THÔNG TIN CHUNG</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Domail Web</label>
                                                    <input type="text" class="form-control" name="site_domain" value="<?= $site_domain;?>" placeholder="VD: shopcode.biz">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Content</label>
                                                    <input type="text" class="form-control" name="site_content" value="<?= $site_content ?>" placeholder="VD: Hệ thống bán mã nguồn website MMO uy tín">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Link Logo</label>
                                                    <input type="text" class="form-control" name="site_logo" value="<?= $site_logo ?>" placeholder="VD: Link Dia Chi ..">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Facebook</label>
                                                    <input type="text" class="form-control" name="facebook" value="<?= $facebook ?>" placeholder="VD: link fb">
                                                </div>
                                            </div>
                                             <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title Web</label>
                                                    <input type="text" class="form-control" name="site_tenweb" value="<?= $site_tenweb ?>" placeholder="VD: Ten Website">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control select2bs4" name="status">
                                                        <option selected value="1">ON
                                                        </option>
                                                        <option value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Chọn OFF website sẽ bật chế độ bảo trì, ADMIN truy cập bình
                                                        thường.</i>
                                                </div>
                                            </div>
                                         
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Hotline</label>
                                                    <input type="text" class="form-control" name="sdt_admin" value="<?= $site_sdt ?>" placeholder="Số điện thoại liên hệ">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email SMTP</label>
                                                    <input type="email" class="form-control" name="email_smtp" value="<?= $site_email ?>" placeholder="Nhập địa chỉ Email SMTP">
                                                    <i>Hướng dẫn cấu hình SMTP <a target="_blank" href="https://www.youtube.com/watch?v=aiMScMCqMIg">tại
                                                            đây</a></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password Email SMTP</label>
                                                    <input type="text" class="form-control" name="pass_email_smtp" value="<?= $site_passemail ?>" placeholder="Nhập mật khẩu Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Token Telegram</label>
                                                    <input type="text" class="form-control" name="token_tele" value="<?= $token_tele ?>" placeholder="Token">
                                                </div>
                                            </div>
                                       
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">ChatID Telegram</label>
                                                    <input type="text" class="form-control" name="chatID_tele" value="<?= $chatID_tele ?>" placeholder="Chat ID">
                                                </div>
                                            </div>

                                        </div>
                                        <button name="submit" class="btn btn-info btn-icon-left m-b-10" type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </form>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            </form>
        </div>
    </div>
    <!-- /.card -->
    </div>
</div>

<?php include('foot.php'); ?>
