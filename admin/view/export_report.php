
<head>
    <title>Thống kê tấc cả sản phẩm đã bán</title>
</head>

<?php

if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}
?>

<body>
<button class="bg-success fw-bold"><a href="index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>
<div class="container">
        <p class="text-center fw-bold fs-3 text-success">Thống kê tấc cả sản phẩm đã bán</p>
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
                $temdmshow= mysqli_query($con, "SELECT sp.tensp,sum(hdct.soluongban) as tongslban,sp.gia*sum(hdct.soluongban) as tonggiaban from hoadonchitiet as hdct inner join sanpham as sp on sp.id=hdct.idsp group by hdct.idsp");
                while ($row1 = mysqli_fetch_assoc($temdmshow)) {
                    echo "<tr>";
                        echo "<td class='text-center'>" . $row1['tensp'] . "</td>";
                        echo "<td class='text-center'>" . $row1['tongslban'] . "</td>";
                        echo "<td class='text-center'>" . $row1['tonggiaban'] . "</td>";
                        $tong+= $row1['tonggiaban'];
                echo "</tr>";
                    }
                    echo 'Tổng doanh thu là: '.$tong.' vnd';
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>