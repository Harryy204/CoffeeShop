<?php
// session_start();
// include 'config.php';

// lấy thông tin cá nhân của người dùng từ cơ sở dữ liệu

$user = $_SESSION['user'];
$query = "SELECT * FROM `nguoidung` WHERE Tennd = '$user'";
$result = mysqli_query($con, $query);
$userInfo = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    // lấy thông tin mới từ form
    $newEmail = $_POST['new_email'];
    $newNumber = $_POST['new_number'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // cập nhật thông tin mới vào cơ sở dữ liệu
    $updateQuery = "UPDATE `nguoidung` SET Email = '$newEmail', Sdt = '$newNumber', Matkhau = '$newPassword' WHERE Tennd = '$user'";
    mysqli_query($con, $updateQuery);

    // chuyển hướng người dùng sau khi cập nhật thông tin
    header('Location: index.php?act=edit_pro');
    exit();
}
?>
<head>
    <title>Sửa Thông Tin</title>
 
    <style>
        h2 {
            background-color: #f5f5f5;
            color: #2c2828;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    }
    if(isset($_SESSION['admin'])){
        echo ' <button class="bg-success fw-bold"><a href="index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>';
    }else{
        echo'';
    }
    ?>
    
    <h2 class="mb-4">Chỉnh Sửa Thông Tin Cá Nhân</h2>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form action="" method="POST" onsubmit="return validateForm();">
                    <div class="mb-3">
                        <label class="form-label">Tên đăng nhập:</label>
                        <input type="text" class="form-control" value="<?php echo $userInfo['tennd']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="new_email" class="form-label">Email mới:</label>
                        <input type="email" id="new_email" name="new_email" class="form-control" value="<?php echo $userInfo['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="new_number" class="form-label">Số điện thoại mới:</label>
                        <input type="number" id="new_number" name="new_number" class="form-control" value="<?php echo $userInfo['sdt']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Mật khẩu mới:</label>
                        <input type="password" id="new_password" name="new_password" class="form-control" value="<?php echo $userInfo['matkhau']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Xác nhận mật khẩu:</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                    </div>
                    <div id="errorMess" style="color: red;"></div>
                    <button type="submit" name="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    <a href="index.php?act=forgot_pass" style="text-decoration: none; float:right">Quên Mật Khẩu</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var newEmail = document.getElementById('new_email').value;
            var newNumber = document.getElementById('new_number').value;
            var newPassword = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;
            var errorMess = document.getElementById('errorMess');
            // xóa thông báo lỗi cũ
            errorMess.innerHTML = "";

            if (newEmail === "" || newNumber === "" || newPassword === "" || confirmPassword === "") {
                errorMess.innerHTML = "Vui lòng điền đầy đủ thông tin";
                return false;
            }
            if (newPassword.length < 3) {
                errorMess.innerHTML = "Mật khẩu phải có hơn 3 ký tự";
                return false;
            }
            if (newPassword != confirmPassword) {
                errorMess.innerHTML = "Mật khẩu không trùng khớp";
                return false;
            }
            if (confirmPassword === "") {
                errorMess.innerHTML = "Vui lòng xác nhận mật khẩu";
                return false;
            }

            var successMess = document.getElementById('successMess');
            alert("Cập nhật thành công");
        }
    </script>

    <?php 

    ?>
</body>

</html>

<?php
// đóng kết nối đến cơ sở dữ liệu
mysqli_close($con);
?>