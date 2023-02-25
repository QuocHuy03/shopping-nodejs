 <?php
    include_once '../Layout/config.php';
    // get id from url to delete nhé !!
    if (isset($_GET['huydeleid'])) {
        $id = $_GET['huydeleid'];
        $sql = "DELETE FROM `category` WHERE id_category = $id";
        $result = pdo_execute($sql);
        echo '<script type="text/javascript">
      alert("xóa thành công nha huydev")
      ;setTimeout(function(){ location.href = add-category.php" },100);
    </script>';
    }
    if (isset($_GET['huydeleidt'])) {
        $id = $_GET['huydeleidt'];
        $sql = "DELETE FROM `products` WHERE id_products = $id";
        $result = pdo_execute($sql);
        echo '<script type="text/javascript">
     alert("xóa thành công nha huydev")
     ;setTimeout(function(){ location.href = add-products.php" },100);
    </script>';
    }
    if (isset($_GET['huydevKh'])) {
        $id = $_GET['huydevKh'];
        $sql = "DELETE FROM `users` WHERE id_user = $id";
        $result = pdo_execute($sql);
        echo '<script type="text/javascript">
      alert("xóa thành công nha huydev")
      ;setTimeout(function(){ location.href = "quan-ly-khach-hang.php" },100);
    </script>';
    }
    if (isset($_GET['huyorder'])) {
        $id = $_GET['huyorder'];
        $sql = "DELETE FROM `order` WHERE id_order = $id";
        $result = pdo_execute($sql);
        echo '<script type="text/javascript">
        alert("xóa thành công nha huydev");
        setTimeout(function(){ location.href = "order.php" },100);
    </script>';
    }

    ?>
