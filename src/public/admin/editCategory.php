<?php include('head.php'); ?>
<?php include('nav.php'); ?>
<?php
include_once '../Layout/config.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `category` WHERE id_category = $id";
$row = pdo_query_one($sql);
$nameCategory = $row['nameCategory'];

// update đổi giá trị của form
if (isset($_POST['submit'])) {
  $nameCategory = $_POST['nameCategory'];
  $sql = "UPDATE `category` SET id_category = $id, nameCategory = '$nameCategory' WHERE id_category = $id";
  $result = pdo_execute($sql);
  echo '<script type="text/javascript">swal("Thành Công","Update Thành Công","success");
    setTimeout(function(){ location.href = "" },1000);</script>';
}

?>
<div class="row">

  <section class="col-lg-12 connectedSortable">

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Sửa Danh Mục</h3>
        <?php echo $nameCategory; ?>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form class="form-horizontal" action="" method="post">
        <div class="card-body">

          <div class="form-group">
            <label for="exampleInputEmail1">Tên Danh Mục</label>
            <input type="text" value="<?php if (isset($nameCategory)) echo $nameCategory; ?>" name="nameCategory" class="form-control">
          </div>

          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
          </div>
      </form>
    </div>
  </section>

</div>


<?php include('foot.php'); ?>