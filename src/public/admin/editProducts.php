<?php include('head.php'); ?>
<?php include('nav.php'); ?>
<?php
include_once '../Layout/config.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `products` WHERE id_products = $id";
$row = pdo_query_one($sql);
$nameProducts = $row['nameProducts'];
$imgProducts = $row['imgProducts'];
$priceProducts = $row['priceProducts'];
$linkProducts = $row['linkProducts'];
$describeProducts = $row['describeProducts'];
$noidungProducts = $row['noidungProducts'];
$typeProducts = $row['typeProducts'];

// update đổi giá trị của form
if (isset($_POST['submit'])) {
  $nameProducts = $_POST['nameProducts'];
  $imgProducts = $_POST['imgProducts'];
  $priceProducts = $_POST['priceProducts'];
  $linkProducts = $_POST['linkProducts'];
  $describeProducts = $_POST['describeProducts'];
  $noidungProducts = $_POST['noidungProducts'];
  $typeProducts = $_POST['typeProducts'];
  $sql = "UPDATE `products` SET id_products = $id, imgProducts = '$imgProducts', priceProducts = '$priceProducts', nameProducts = '$nameProducts', linkProducts = '$linkProducts', describeProducts = '$describeProducts', noidungProducts = '$noidungProducts' , typeProducts = '$typeProducts' WHERE id_products = $id";
  $result = pdo_execute($sql);
  echo '<script type="text/javascript">swal("Thành Công","Update Thành Công","success");
    setTimeout(function(){ location.href = "" },1000);</script>';
}
?>

<div class="row">

  <section class="col-lg-12 connectedSortable">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Sửa Sản Phẩm</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form class="form-horizontal" action="" method="post">
        <div class="card-body">

          <div class="form-group">
            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
            <input type="text" value="<?php if (isset($nameProducts)) echo $nameProducts; ?>" name="nameProducts" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Hình Ảnh</label>
            <input type="text" value="<?php if (isset($imgProducts)) echo $imgProducts; ?>" name="imgProducts" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Price Sản Phẩm</label>
            <input type="text" value="<?php if (isset($priceProducts)) echo $priceProducts; ?>" name="priceProducts" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Link Sản Phẩm</label>
            <input type="text" value="<?php if (isset($linkProducts)) echo $linkProducts; ?>" name="linkProducts" class="form-control">
          </div>


          <div class="form-group">
            <label for="exampleInputEmail1">Danh Mục Sản Phẩm</label>
            <select class="custom-select" name="typeProducts">
              <?php
              $spl_danhmuc = "SELECT * FROM category ORDER BY id_category DESC";
              $query_danhmuc = pdo_query($spl_danhmuc);
              foreach ($query_danhmuc as $row) {
                if ($row['codeCategory'] == $typeProducts) {
              ?>
                  <option selected value="<?php echo $row['codeCategory'] ?>">
                    <?php echo $row['nameCategory'] ?></option>
                <?php
                } else {
                ?>
                  <option value="<?php echo $row['codeCategory'] ?>">
                    <?php echo $row['nameCategory'] ?></option>
              <?php }
              } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Mô Tả Sản Phẩm</label>
            <textarea name="describeProducts" class="textarea" required=""><?php if (isset($describeProducts)) echo $describeProducts; ?></textarea>
          </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nội Dung Sản Phẩm</label>
            <textarea name="noidungProducts" class="textarea" required=""><?php if (isset($noidungProducts)) echo $noidungProducts; ?></textarea>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
          </div>
      </form>
    </div>
  </section>

</div>



<?php include('foot.php'); ?>