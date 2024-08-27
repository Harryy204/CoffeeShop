<head>
    <title>Thống kê theo danh mục</title>
</head>

<body>
    <?php
   if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}
   $id_count=1;

    ?>

    <button class="bg-success fw-bold"><a href="index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>
    <h1 class=" text-center text-success">Thống kê theo danh mục</h1>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Giá cao nhất</th>
                    <th>Giá thấp nhất</th>
                    <th>Giá trung bình</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                
                while ($tk = mysqli_fetch_array($record)) {
                    echo '
                <tr>
                    <td>'.$id_count.'</td>
                            <td>'.$tk['tendm'].'</td>
                            <td>'.$tk['countsp'].'</td>
                            <td>'.number_format($tk['maxgia'], 0, ',', '.').' VNĐ</td>
                            <td>'.number_format($tk['mingia'], 0, ',', '.').' VNĐ</td>
                            <td>'.number_format($tk['avggia'], 0, ',', '.').' VNĐ</td>
                   
                </tr>';
                    $id_count++;
                }
                ?>
            </tbody>
        </table>
        <?php
        echo '<div class="but-move">
        <button><a href="index.php?act=bieudotk">Xem biểu đồ</a></button>
    </div>';
?>
    </div>

</body>

</html>