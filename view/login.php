<head>
    <title>Đăng Nhập</title>
    <style>
        .have-account a {
            text-decoration: none;
            color: black;
        }

        .have-account a:hover {
            color: green;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    // đếm số lượng sản phẩm có trong giỏ hàng
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-5 mb-5 m-auto shadow">
                <p class="text-success text-center fw-bold fs-5 mt-3">Đăng Nhập</p>
                <form action="index.php?act=dangnhap" method="POST">
                    <div class="mb-3">
                        <label for="email">Nhập Địa Chỉ Email</label>
                        <input type="email" id="email" name="email" placeholder="Nhập Địa Chỉ Email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Nhập Mật Khẩu</label>
                        <input type="password" id="password" name="password" placeholder="Nhập Mật Khẩu" class="form-control" required>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <button name="dangnhap" class="w-50 bg-success fs-4 fw-bold text-white rounded">Đăng Nhập</button>
                    </div>
                    <div class="have-account pb-3 d-flex justify-content-between">
                        <a href="index.php?act=forgot_pass">Bạn đã quên mật khẩu?</a>
                        <a href="index.php?act=register">Đăng Ký Ngay</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


