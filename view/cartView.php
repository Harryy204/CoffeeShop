<head>
    <title>Giỏ hàng</title>
</head>

<body>
    <a class="text-decoration-none text-success fs-5" style="margin-left: 88%;" href="index.php?act=cart_order">Đơn hàng của bạn</a>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="bg-light text-dark text-center p-2 border-bottom">Giỏ Hàng</h2>
            </div>
        </div> 
    </div>
    <div class="container-fluid">
        <div class="row justify-content-around">
            <div class="col-sm-12 col-md-6 col-lg-9">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Tiền</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $pay_total = 0;
                        $i = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total = $value['gia'] * $value['soluong'];
                                $pay_total += $value['gia'] * $value['soluong'];
                                $i = $key + 1;
                                // format giá
                                $formatted_price = number_format($value['gia'], 0, ',', '.') . ' VNĐ';
                                $formatted_total = number_format($total, 0, ',', '.') . ' VNĐ';
                                echo '
                                    <form action="index.php?act=cart" method="post">
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td><input type="hidden" name="name" value="' . $value['tensp'] . '">' . $value['tensp'] . '</td>
                                        <td><input type="hidden" name="price" value="' . $value['gia'] . '">' . $formatted_price . ' </td>
                                        <td><input type="number" min=1 name="quantity" value="' . $value['soluong'] . '"></td> 
                                        <td>' . $formatted_total . ' </td>
                                        <td>
                                        <button name ="update" class="btn btn-outline-warning">Cập nhật</button>
                                        </td>
                                        <td>
                                            <input type="hidden" name="item" value="' . $value['tensp'] . '">
                                            <button onclick="return confirm(\'Bạn có chắc chắn muốn xóa không?\')"
                                            type="submit" name="remove" class="btn btn-outline-danger">Xóa</button>
                                        </td>
                                    </form>
                                    ';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 text-center" style="margin-bottom: 77px;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Tiền</h5>
                        <h1 class="card-text bg-success text-white"><?php echo number_format($pay_total, 0, ',', '.') ?> VNĐ</h1>
                        <a href="index.php?act=checkout" class="btn btn-success">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

