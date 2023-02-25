<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<?php
include_once '../Layout/config.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `users` WHERE id_user = $id";
$row = pdo_query_one($sql);
$email = $row['email'];
$username = $row['username'];
$password = $row['password'];
$role = $row['role'];
$price = $row['price'];

// update đổi giá trị của form
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $price = $_POST['price'];
    $sql = "UPDATE `users` SET id_user = $id, email = '$email', username = '$username', role = '$role', password = '$password', price = '$price' WHERE id_user = $id";
    $result = pdo_execute($sql);
    echo '<script type="text/javascript">swal("Thành Công","Update Thành Công!,"success");
    setTimeout(function(){ location.href = "users.php" },1000);</script>';
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
            <label for="exampleInputEmail1">Role</label>
            <input type="text" class="form-control" value="<?php if (isset($role)) echo $role; ?>" name="role">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" value="<?php if (isset($email)) echo $email; ?>" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text"  value="<?php if (isset($username)) echo $username; ?>" name="username" class="form-control">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Password(Không Mã Hóa)</label>
            <input type="text" value="<?php if (isset($password)) echo $password; ?>" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="text" value="<?php if (isset($price)) echo $price; ?>" name="price" class="form-control">
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