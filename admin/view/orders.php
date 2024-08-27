<head>
    <title>Quản Lý Người Dùng</title>
</head>

<body>
    <?php

if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}

    ?>
    <button class="bg-success fw-bold"><a href="index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>


    <tbody>
        <!-- lặp qua danh sách các đơn hàng từ database và hiển thị trong bảng -->
        <div class="container">
            <h1 class="heading text-center text-success">Danh sách đơn hàng</h1>

            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th scope="col">MHD</th>
                        <th scope="col">MSP</th>
                        <th scope="col">Tên</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Thanh toán</th>
                        <th scope="col">Số lượng bán</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $sql = "SELECT * FROM hoadonchitiet";
                      $result = $con->query($sql);

                    // kiểm tra xem có dữ liệu trả về hay không
                    if ($result->num_rows > 0) {
                        while ($order = $result->fetch_assoc()) {
                            echo '<tr class="text-center">
                             <td>' . $order['idhd'] . '</td>
                             <td>' . $order['idsp'] . '</td>
                             <td>' . $order['tenkhachhang'] . '</td>
                             <td>' . $order['sdt'] . '</td>
                             <td>' . $order['diachi'] . '</td>
                             <td>' . $order['cachthanhtoan'] . '</td>
                             <td>' . $order['soluongban'] . '</td>
                             <td>' . number_format($order['giatong'], 0, ',', '.') . ' VNĐ</td>
                             <td>' . $order['ghichu'] . '</td>
                             <td>' . $order['trangthai'] . '</td>
                             <td width="100px" style="text-align:center">';
                            if ($order['trangthai'] == 'Chưa thanh toán') {
                                echo '<a href="index.php?act=orders_update&idhd='.$order['idhd'].'"  class="btn btn-success">Sửa</a>';
                            } else {
                                echo '<a href="#" class="btn btn-success disabled">Sửa</a>';
                            }
                            echo '</td>
                         </tr>';
                        }
                    } else {
                        echo "<tr><td colspan='8'>Không có đơn hàng nào trong cơ sở dữ liệu</td></tr>";
                    }

                    $con->close();
                    ?>
                </tbody>
            </table>
        </div>

</body>

</html>