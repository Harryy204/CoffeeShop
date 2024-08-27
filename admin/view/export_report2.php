
<head>
    <title>Thống kê sản phẩm danh mục theo ngày theo ngày</title>
</head>

<?php

if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}
?>

<body>
<button class="bg-success fw-bold"><a href="index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>
<div class="container">
        <p class="text-center fw-bold fs-3 text-success">Thống kê sản phẩm danh mục theo ngày theo ngày</p>
        <form action="index.php?act=export_report2" method="POST" class="mb-3">
            <div class="input-group">
                <input type="date" name="ngaybatdau" class="form-control">
                <input type="date" name="ngayketthuc" class="form-control"><br>              
                <select name="category_id">
                    <?php
                    while ($category = mysqli_fetch_array($categoryResult)) {
                        echo '<option value="' . $category['id'] . '">' . $category['tendm'] . '</option>';
                    }
                    ?>
                </select>
                
                <button type="submit" name="hienthikq" class="btn btn-primary">Hiển thị kết quả</button> 
                <button type="submit" name="export" class="btn btn-primary" style="background-color:green;">Export Excel</button>             
            </div>
        </form>
    </div>
    <div class="container col-md-6 mt-5">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng sản phẩm đã bán</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tong=0;
                while ($row2 = mysqli_fetch_array($export)) {
                    echo "<tr>";
                        echo "<td class='text-center'>" . $row2['tensp'] . "</td>";
                        echo "<td class='text-center'>" . $row2['tongslban'] . "</td>";
                        echo "<td class='text-center'>" . $row2['tonggiaban'] . "</td>";
                        $tong+= $row2['tonggiaban'];
                echo "</tr>";
                    }
                    echo 'Tổng doanh thu là: '.$tong.' vnd';
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>