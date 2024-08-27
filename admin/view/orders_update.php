<head>
    <title>Quản lý đơn hàng</title>    
</head>

<body>
<button class="bg-success fw-bold"><a href="index.php?act=orders" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Đơn Hàng</a></button>
    <div class="container">
        <h1 class="heading text-center text-success">Sửa đơn hàng</h1>
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
                

                // lấy thông tin đơn hàng từ cơ sở dữ liệu
                if (isset($_GET['idhd'])) {
                    $order_id = $_GET['idhd'];
                    $sql = "SELECT * FROM hoadonchitiet WHERE idhd = $order_id";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        $order = $result->fetch_assoc();
                        echo '
                        <tr>
                            <td>' . $order['idhd'] . '</td>
                            <td>' . $order['idsp'] . '</td>
                            <td>' . $order['tenkhachhang'] . '</td>
                            <td>' . $order['sdt'] . '</td>
                            <td>' . $order['diachi'] . '</td>
                            <td>' . $order['cachthanhtoan'] . '</td>
                            <td>' . $order['soluongban'] . '</td>
                            <td>' . number_format($order['giatong'], 0, ',', '.') . ' VNĐ</td>
                            <td>' . $order['ghichu'] . '</td>
                            <td>
                                <form action="index.php?act=orders_update" method="post" style="display: flex; align-items: center;">
                                    <input type="hidden" name="idhd" value="' . $order['idhd'] . '">
                                    <select name="trangthai" class="form-select" style="flex: 1; margin-right: 10px;">
                                        <option value="Chưa thanh toán"' . ($order['trangthai'] == "Chưa thanh toán" ? " selected" : "") . '>Chưa thanh toán</option>
                                        <option value="Đã thanh toán"' . ($order['trangthai'] == "Đã thanh toán" ? " selected" : "") . '>Đã thanh toán</option>
                                    </select>
                                    <button type="submit" class="btn btn-outline-success" style="margin-right: 5px;">Lưu</button>
                                </form>
                            </td>

                        </tr>';
                    } else {
                        echo "<tr><td colspan='7'>Không tìm thấy đơn hàng</td></tr>";
                    }
                }

                $con->close();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
