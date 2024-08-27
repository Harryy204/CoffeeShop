<head>
    <title>Thanh Toán</title>
</head>
<body>
    <h2 class="bg-light text-dark text-center p-2 border-bottom text-uppercase">Thanh toán đơn hàng</h2>
    <div class="container">
        <section class="checkout-form">
            <div class="card p-3 mx-auto w-50">
                <div class="col-lg-7">
                    <?php
                    // hiển thị thông tin giỏ hàng từ session
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        $grand_total = 0;
                        foreach ($_SESSION['cart'] as $key => $product) {
                            $total_price = number_format($product['gia'] * $product['soluong']);
                            $grand_total += $product['gia'] * $product['soluong'];
                    ?>
                            <span><?php echo $product['tensp'] . '(' . $product['soluong'] . ') '; ?></span>
                    <?php
                        }
                    } else {
                        // khởi tạo giá trị cho $grand_total khi giỏ hàng rỗng
                        $grand_total = 0;
                        echo "<div class='display-order'><span>Giỏ hàng của bạn trống</span></div>";
                    }
                    ?>
                </div>
                <span class="grand-total d-flex justify-content-center align-items-center text-center">Tổng tiền: <?php echo number_format($grand_total, 0, ',', '.') ?> VNĐ</span>
            </div>
        </section>
        <!-- form nhập thông tin thanh toán -->
        <form action="index.php?act=checkout_comfirm" method="post" style="margin-left: 430px;">
                <div class="form-row mx-60">
                    <div class="form-group col-md-6">
                        <label for="name">Họ và tên</label>
                        <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="number">Số điện thoại</label>
                        <input type="number" class="form-control" id="number" placeholder="Nhập số điện thoại" name="number" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ (Số nhà, đường)" name="address" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="method">Phương thức thanh toán</label>
                        <select class="form-select" id="method" name="method">
                            <option value="Thanh toán khi nhận hàng" selected>Thanh toán khi nhận hàng</option>
                            <option value="Thẻ tín dụng">Thẻ tín dụng</option>
                            <option value="ZaloPay">ZaloPay</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="note">Ghi chú</label>
                        <textarea name="note" id="note" class="form-control p-2" placeholder="Ghi chú với cửa hàng" maxlength="500" rows="5"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-3 mb-3" name="order_btn" style="margin-left: 130px;">Xác nhận đặt hàng</button>
            </form>
        </section>
    </div>
