<head>
    <title>Đăng Ký</title>
    <style>
        .have-account a{
            text-decoration: none;
            color: black;
        }
        .have-account a:hover{
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
            <div class="col-md-6 mt-5 mb-5 m-auto shadow">
                <p class="text-success text-center fw-bold fs-5 mt-3">Đăng Ký</p>
                <form action="index.php?act=dangky" method="POST">
                    <div class="mb-3">
                        <label for="">Tên Đăng Nhập</label>
                        <input type="text" id="name" name="name" placeholder="Nhập Tên Đăng Nhập" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Địa Chỉ Email</label>
                        <input type="email" id="email" name="email" placeholder="Nhập Địa Chỉ Email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="">Số Điện Thoại</label>
                        <input type="number" id="number" name="number" placeholder="Nhập Số Điện Thoại" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Nhập Mật Khẩu</label>
                        <input type="password" id="password" name="password" placeholder="Nhập Mật Khẩu" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Địa Chỉ</label>
                        <input type="text" id="address" name="address" placeholder="Nhập Địa Chỉ" class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <button name="submit" type="submit" class="w-50 bg-success fs-4 fw-bold text-white rounded">Đăng Ký</button>
                    </div>
                    <div class="have-account d-flex justify-content-between">
                    <p>Bạn đã có tài khoản?</p>
                    <a href="index.php?act=login">Đăng Nhập</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
