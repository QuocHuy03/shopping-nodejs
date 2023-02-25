<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/home/" class="nav-link">HOME</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="//zalo.me/0375343460" class="nav-link">LIÊN HỆ KỸ THUẬT</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="https://i.imgur.com/AQKEmIt.jpeg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Le Quoc Huy
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Chào hôm nay của bạn tốt chứ.!</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 1 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light"></span>
    </a>

    <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="/admin" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/users.php" class="nav-link ">
                            <i class="nav-icon fas fa-user-alt"></i>
                                <p>Thành Viên</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/addProducts.php" class="nav-link ">
                            <i class="nav-icon fas fa-plus"></i>
                                <p>Thêm Sản Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="/admin/addCategory.php" class="nav-link ">
                            <i class="nav-icon fas fa-plus"></i>
                                <p>Thêm Danh Mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/listBank.php" class="nav-link">
                                <i class="nav-icon fas fa-university"></i>
                                <p>
                                    Ngân Hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/listBankAuto.php" class="nav-link ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    List Bank Auto
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/listCard.php" class="nav-link ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    List Card
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/thongke.php" class="nav-link ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Thống Kê Sản Phẩm
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/orderProducts.php" class="nav-link ">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    List Đơn Hàng
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/settings.php" class="nav-link ">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Cài Đặt
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
    <!-- /.sidebar -->
</aside>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Modal -->
            <div class="modal fade" id="modalDownBackupVia" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">UPFILE BACKUP VIA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload File Backup (file phải được nén thành ZIP)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="file_zip">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">UID BACKUP</label>
                                    <input type="text" class="form-control" name="uid" placeholder="Nhập UID VIA" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">HỦY BỎ</button>
                                <button type="submit" name="btnUpFile" class="btn btn-primary">UPFILE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>