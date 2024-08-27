<?php
echo '
<button class="bg-success fw-bold"><a href="index.php?act=report_category" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Quay lại</a></button>';
?>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div class="container mt-5"
id="myChart" style="width:100%; max-width:1000px; height:600px;  border-radius: 1px grey;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
var data = google.visualization.arrayToDataTable([
    ['Danh mục','số lượng sản phẩm'],
    <?php
        $tongdm=$record_dms;
        $i=1;
        while ($tk = mysqli_fetch_array($record)) {
            if($i==$tongdm) $dauphay=""; else $dauphay=",";
            echo "['".$tk['tendm']."', ".$tk['countsp']."]".$dauphay;
            $i+=1;
        }
        
        ?>
]);

// Set Options
var options = {
  title:'Thống kê hàng hóa theo danh mục'
};

// Draw
var chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>