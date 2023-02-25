<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<?php
include_once '../Layout/config.php'; ?>


<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">NHÓM THỐNG KÊ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px">STT</th>
                                <th>Mã Danh Mục</th>
                                <th>Tên Danh Mục</th>
                                <th>Loại Hàng</th>
                                <th>Giá Cao Nhất</th>
                                <th>Giá Thấp Nhất</th>
                                <th>Giá Trung Bình</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            $sql = "SELECT category.codeCategory as madm, category.nameCategory as tendm, count(products.id_products) as countsp, min(products.priceProducts) as minprice , max(products.priceProducts) as maxprice , avg(products.priceProducts) as avgprice FROM products left join category ON category.codeCategory = products.typeProducts GROUP BY category.codeCategory ORDER BY category.codeCategory DESC";
                            $result = pdo_query($sql);
                            foreach ($result as $row1) {
                                extract($row1);
                            ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $i++; ?>
                                    </td>
                                    <td class="text-center">
                                    <?= $madm; ?>
                                    </td>
                                    <td class="text-center">
                                    <?= $tendm; ?>
                                    </td>
                                    <td class="text-center">
                                    <?= $countsp; ?>
                                    </td>
                                    <td class="text-center">
                                    <?= number_format($maxprice) ?>
                                    </td>
                                    <td class="text-center">
                                    <?= number_format($minprice) ?>
                                    </td>
                                    <td class="text-center">
                                    <?= number_format($avgprice) ?>
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="piechart" class="card"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh Mục', 'Số Lượng Products'],
            <?php
            $total = count($result);
            $i = 1;
            foreach ($result as $huyit) {
                extract($huyit);
                if ($i == $total) $dauphay = "";
                echo "['" . $huyit['tendm'] . "'," . $huyit['countsp'] . "],";
                $i += 1;
            }
            ?>
        ]);
        var options = {
            'title': 'Thống Kê Sản Phẩm Theo Danh Mục Nhé',
            'width': 900,
            'height': 700
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(function() {
        $("#datatable2").DataTable({
            "responsive": false,
            "autoWidth": false,
        });
    });

    function copy(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        swal("Thành Công", "Sao Chép Thành Công", "success");
        $temp.remove();
    }
</script>
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