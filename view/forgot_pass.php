<head>
    <title>Quên mật khẩu</title>
</head>

<body>
    <?php
    // đếm số lượng sản phẩm có trong giỏ hàng
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    }
    ?>
    <form method="POST">
        <h2 class="bg-light text-dark text-center p-2 border-bottom">Nhập Địa Chỉ Email Của Bạn Để Đặt Lại Mật Khẩu</h2>
        <div style="display: flex; justify-content: center; margin-bottom: 200px;">
            <div class="justify-content-center">
                <div class="mb-3">
                    <label class="form-label">Email</label><br>
                    <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email">
                    <div class="form-text">Chúng tôi sẽ gửi cho bạn mật khẩu mới</div>
                </div>
                <button type="submit" name="reset" class="btn btn-primary">Gửi</button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['reset'])) {
        $email = $_POST['email'];
        // kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
        $checkEmail = "SELECT * FROM nguoidung WHERE email = '$email'";
        $result = mysqli_query($con, $checkEmail);

        if (mysqli_num_rows($result) > 0) {
            // nếu email tồn tại gửi mật khẩu mới
            $newPassword = "newpass".rand(0,999999);;

            // cập nhật mật khẩu mới trong cơ sở dữ liệu
            $updatePassword = "UPDATE nguoidung SET matkhau = '$newPassword' WHERE email = '$email'";
            if (mysqli_query($con, $updatePassword)) {
                echo "
                <script>
                alert ('Mật khẩu của bạn đã được đặt lại thành:".$newPassword."');
                window.location.href='index.php?act=login';
                </script>
                ";
            } else {
                echo "Lỗi khi cập nhật mật khẩu: " . mysqli_error($con);
            }
        } else {
            echo "<script>
            alert ('Email không tồn tại trong cơ sở dữ liệu');
            window.location.href='index.php?act=forgot_pass';
            </script>";
        }

        // đóng kết nối đến cơ sở dữ liệu
        mysqli_close($con);
    }
    ?>


