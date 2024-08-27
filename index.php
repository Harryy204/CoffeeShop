<?php
    session_start();
    ob_start();
    include "model/config.php";
    include "model/category.php";
    include "model/product.php";
    include "view/header.php";
    if(isset($_GET['act'])){
        switch ($_GET['act']){
            //Trang giới thiệu
        case 'about':
            include 'view/about.php';
            break;
            //Giới thịệu nguồn gốc
            case 'history':
                include 'view/history.php';
                break;
            //Giới thịệu nguồn nguyên liệu
            case 'origin':
                include 'view/origin.php';
                break;
            //Giới thịệu sứ mệnh
            case 'mission':
                include 'view/mission.php';
                break;
            //Các trang danh mục
        case 'category_one':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $record = mysqli_query($con, "SELECT * FROM `sanpham` WHERE iddm = '$id'");
                $record2 = mysqli_query($con, "SELECT * FROM `danhmuc` WHERE id = '$id'");
            }
            include 'view/category_one.php';
            break; 
            //Trang giỏ hàng
        case 'cartView':
            include 'view/cartView.php';
            break;  
            //Xử lý thêm, sửa, xóa trong giỏ hàng
        case 'cart':
            // kểm tra xem $_SESSION['cart'] có tồn tại hay không
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            $product_name = $_POST['name'];
            $product_price = $_POST['price'];
            $product_quantity = $_POST['quantity'];


            if (isset($_POST['addCart'])) {
                $check_product = array_column($_SESSION['cart'], 'tensp');
                if (in_array($product_name, $check_product)) {
                    echo '
                    <script>
                    alert("Sản phẩm này đã có trong giỏ hàng");
                    window.location.href = "index.php?act=cartView";
                    </script>
                    ';
                } else {
                    $_SESSION['cart'][] = array(
                        'tensp' => $product_name,
                        'gia' => $product_price,
                        'soluong' => $product_quantity
                        
                    );
                    header('location: index.php?act=cartView');
                }
            }

            // xóa sản phẩm
            if (isset($_POST['remove'])) {
                $product_name = $_POST['item'];
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value['tensp'] === $product_name) {
                        unset($_SESSION['cart'][$key]);
                        break;
                    }
                }
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('location: index.php?act=cartView');
            }

            // cập nhật sản phẩm
            if (isset($_POST['update'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value['tensp'] === $_POST['item']) {
                        $_SESSION['cart'][$key] = array(
                            'tensp' => $product_name,
                            'gia' => $product_price,
                            'soluong' => $product_quantity
                        );
                        header('location: index.php?act=cartView');
                    }
                }
            }
            include 'view/cartView.php';
            break;  
            //Trang chi tiết sản phẩm
            case 'details':
                include 'view/details.php';
                break; 
            //Trang liên hệ
        case 'contact':
            include 'view/contact.php';
            break;  
            //Trang tìm kiếm sản phẩm
        case 'search':
            if (isset($_POST['searchPro'])) {
                $searchTerm = $_POST['searchPro'];
                // truy vấn cơ sở dữ liệu để tìm kiếm sản phẩm
                $query = "SELECT * FROM sanpham WHERE tensp LIKE '%$searchTerm%'";
                $result = mysqli_query($con, $query);}
            include 'view/search.php';
            break;  
            //Trang đăng nhập
        case 'login':
            include 'view/login.php';
            break;   
            //Xử lí thông tin đăng nhập
        case 'dangnhap':
            if(isset($_POST['dangnhap'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $result = mysqli_query($con, "SELECT * FROM `nguoidung` WHERE (email = '$email') AND matkhau = '$password'");

                if (mysqli_num_rows($result)) {
                    $user_info = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $user_info['id'];
                    $_SESSION['user'] = $user_info['tennd'];
                
                    // kiểm tra vai trò của người dùng
                    $role = $user_info['role'];
                
                    if ($role === 'admin') {
                        // đánh dấu người dùng là admin trong session
                        $_SESSION['admin'] = $user_info['tennd'];
                
                        // chuyển hướng đến trang quản trị
                        header("Location: admin/index.php");
                        exit();
                    } else {
                        // nếu không phải admin, chuyển hướng đến trang người dùng thông thường
                        header("Location: index.php");
                        exit();
                    }
                } else {
                    echo '
                        <script>
                        alert("Tài Khoản Hoặc Mật Khẩu Không Chính Xác");
                        window.location.href = "index.php?act=login";
                        </script>
                    ';
                }
        }
        include 'index.php';
            break; 
            //Trang đăng ký
        case 'register':
            include 'view/register.php';
            break; 
            //Xử lý thông tin đăng ký   
        case 'dangky':
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $number = $_POST['number'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
            
                // kiểm tra thông tin không được để trống
                if (empty($name) || empty($email) || empty($number) || empty($password)) {
                    echo '<script>
                        alert("Vui lòng điền đầy đủ thông tin");
                        window.location.href = "index.php?act=register";
                        </script>';
                } else {
                    $ch_email = mysqli_query($con, "SELECT * FROM `nguoidung` WHERE email = '$email'");
                    
                    if (mysqli_num_rows($ch_email)) {
                        echo '<script>
                            alert("Email đã được sử dụng");
                            window.location.href = "index.php?act=register";
                            </script>';
                    } else {
                        // kiểm tra mật khẩu phải lớn hơn 3 ký tự
                        if (strlen($password) < 3) {
                            echo '<script>
                                alert("Mật khẩu phải có ít nhất 3 ký tự");
                                window.location.href = "index.php?act=register";
                                </script>';
                        } else {
                            mysqli_query($con, "INSERT INTO `nguoidung`(`tennd`, `sdt`, `email`, `matkhau`, `diachi`) 
                            VALUES ('$name', '$number', '$email', '$password', '$address')");                
                            echo '<script>
                                alert("Đăng Ký Thành Công.");
                                window.location.href = "index.php?act=login";
                                </script>';
                        }
                    }
                }
            }
            include 'view/login.php';
            break;
            //Trang quên mật khẩu
        case 'forgot_pass':
            include 'view/forgot_pass.php';
            break; 
            //Trang chỉnh sửa thông tin người dùng
        case 'edit_pro':
            include 'admin/view/edit_pro.php';
            break; 
            //Trang cửa hàng
        case 'store':
            include 'view/store.php';
            break;   
            //Trang thanh toán 
        case 'checkout':
            include 'view/checkout.php';
            break; 
            case 'cart_order':
                include 'view/cart_order.php';
                break; 
            //Kiểm lỗi hóa đơn
        case 'checkout_comfirm':
            include 'view/checkout_confirm.php';
            break; 
            //Lệnh logout
        case 'logout':
            unset($_SESSION['user_id']);
            unset($_SESSION['user']);
            unset($_SESSION['admin']);
            header("Location: index.php");
            break;
        default:
        include "view/home.php";
            break;
        
    }
    }else{
        //Trang chủ phẩn san phẩm
        $x='0,04';
        $y='0,16';
        //Sản phẩm mới
        $record = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY id desc limit $x ");
        //Sản phẩm gợi ý
        $record_2=mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY RAND ( ) LIMIT $y");
        include "view/home.php";
        
    }
    
    include "view/footer.php";
?>