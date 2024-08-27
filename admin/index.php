<?php
require_once dirname(__FILE__) . '/../libs/PHPExcel/PHPExcel.php';
session_start();
include '../model/config.php';
include '../model/category.php';
include '../model/product.php';
include '../model/comment.php';
include '../model/user.php';
include '../model/report.php';
include '../model/bill.php';
// include '../model/PHPExcel.php';
include 'view/header.php';
if(isset($_GET['act'])){
    switch ($_GET['act']) {
        //Trang chỉnh sửa thông tin admin
        case 'edit_pro':
            include 'view/edit_pro.php';
            break;
        //Trang quên mật khẩu
        case 'forgot_pass':
            include 'view/forgot_pass.php';
            break;
        //Trang quản lý hóa đơn
        case 'orders':
            include 'view/orders.php';
            break;
        //Trang xử lý cập nhật hóa đơn
        case 'orders_update':
            if (isset($_POST['idhd']) && isset($_POST['trangthai'])) {
                $order_id = $_POST['idhd'];
                $status = $_POST['trangthai'];
                // cập nhật trạng thái đơn hàng trong cơ sở dữ liệu
                $sql_update = "UPDATE hoadonchitiet SET trangthai = '$status' WHERE idhd = $order_id";
                $result_update = $con->query($sql_update);
                header("location: index.php?act=orders");
            }
            include 'view/orders_update.php';
            break;
            
        //Trang qunr lý danh mục
        case 'category':
            include 'view/category.php';
            break;
        //Xử lý thêm danh mục
        case 'category_add':
            if (isset($_POST['submit_category'])) {
                $category_name = $_POST['category_name'];
                $category_add=category_insert($category_name);
            }
            include 'view/category.php';
            break;
        //Xử lý xóa danh mục
        case 'category_delete':
            if (isset($_GET['id'])&&($_GET['id'])) {
                $categoryId = $_GET['id'];
                $category_pro_del=category_pro_del($categoryId);
                $category_delete=category_delete($categoryId);
            }
            include 'view/category.php';
            break; 
        //Trang quản lý sản phẩm
        case 'product':
            include 'view/product.php';
            break;    
        //Xử lý thêm sản phẩm
        case 'product_add':
            if (isset($_POST['submit'])) {
                $product_name = $_POST['tensp'];
                $product_price = $_POST['gia'];
                $product_details = $_POST['mota'];
                $category_id = $_POST['category_id'];
                $product_quantity = $_POST['soluong'];
                $current_date = date('Y-m-d');
                // thêm ảnh sản phẩm
                $image_name = $_FILES['img']['name'];
                $image_tmp = $_FILES['img']['tmp_name'];
                $image_folder= "../uploadimage/";
                $image_des =$image_folder.$image_name;
                // di chuyển ảnh đến thư mục lưu trữ
                move_uploaded_file($image_tmp, $image_des);
                // thêm sản phẩm
                $insertQuery = "INSERT INTO `sanpham` (`iddm`, `tensp`, `gia`, `img`, `mota`, `soluong`, `ngaynhap`) 
                VALUES ('$category_id', '$product_name', '$product_price', '$image_des', '$product_details', '$product_quantity', '$current_date')";
                if (mysqli_query($con, $insertQuery)) {
                    include 'view/product.php';
                } else {
                    echo "Lỗi: " . mysqli_error($con);
                }
            }  
            
            break;   
            //Xử lý xóa sản phẩm
        case 'product_delete':
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product_delete=product_delete($id);}
            include 'view/product.php';
            break;    
            //Trang cập nhật sản phẩm
        case 'product_update':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $categoryResult = mysqli_query($con, "SELECT * FROM danhmuc");
                $record = mysqli_query($con, "SELECT * FROM `sanpham` WHERE id = '$id'");
                $data = mysqli_fetch_array($record);
            } 
            if (isset($_POST['update'])){
                $id = $_POST['id'];
                $product_name = $_POST['tensp'];
                $product_price = $_POST['gia'];
                $product_details = $_POST['mota'];
                $category_id = $_POST['category_id'];
                $product_quantity = $_POST['soluong'];
            
                // upload hình ảnh
                $image_name = $_FILES['img']['name'];
                $image_tmp = $_FILES['img']['tmp_name'];
                $image_folder= "../uploadimage/";
                $image_des =$image_folder.$image_name;
                // di chuyển hình ảnh vào thư mục lưu trữ
                move_uploaded_file($image_tmp, $image_des);
                $product_update=product_update($product_name,$product_price,$image_des,$category_id,$product_details,$product_quantity,$id);           
                header("location: index.php?act=product");
                exit;
            }
            include 'view/product_update.php';
            break;
        //Trang quản lý người dùng 
        case 'user':
            include 'view/user.php';
            break;
        //Xử lý xóa tài khoảng người dùng
        case 'user_delete':
            $id = $_GET['id'];
            $user_delete=user_delete($id);
            include 'view/user.php';
            break;
        //Trang quản lý bình luận
        case 'comment':           
            $commentResult= mysqli_query($con, "SELECT sp.tensp,bl.id,bl.noidung,bl.ngaybl,nd.tennd from binhluan as bl, sanpham as sp, nguoidung as nd where bl.idsp=sp.id AND nd.id=bl.idnd");
            include 'view/comments.php';
            break;    
     
        //Xử lý xóa bình luận của khách hàng
        case 'comment_delete':
            if (isset($_POST['delete_comment'])) {
                $comment_id = $_POST['comment_id'];
                $comment_delete=comment_delete($comment_id);
            }
            include 'view/comments.php';
            break; 
        //Trang thống kê
            case 'report_category':
            $record = mysqli_query($con, "SELECT danhmuc.tendm,danhmuc.id,count(sanpham.id) as countsp, min(sanpham.gia) as mingia ,max(sanpham.gia) as maxgia, avg(sanpham.gia) as avggia from sanpham left join danhmuc on danhmuc.id=sanpham.iddm 
            group by danhmuc.id 
            order by danhmuc.id desc");
            include 'view/report_category.php';
            break;
        //Biểu đồ thống kê
        case 'bieudotk':
            $record_dms=mysqli_query($con,"SELECT * FROM danhmuc COUNT('id')");
            $record= mysqli_query($con, "SELECT danhmuc.tendm,danhmuc.id,count(sanpham.id) as countsp, min(sanpham.gia) as mingia ,max(sanpham.gia) as maxgia, avg(sanpham.gia) as avggia from sanpham left join danhmuc on danhmuc.id=sanpham.iddm group by danhmuc.id order by danhmuc.id desc");
            include 'view/bieudotk.php';
            break;
        //thống kê sản phẩm danh mục theo ngày theo ngày
        case 'export_report':
            // phpinfo();
            $categoryQuery = "SELECT * FROM danhmuc";
            $categoryResult = mysqli_query($con, $categoryQuery);
        include 'view/export_report.php';
        break;
        //cjsdnv
        case 'export_report2':
            $categoryQuery = "SELECT * FROM danhmuc";
            $categoryResult = mysqli_query($con, $categoryQuery);
           
            if((isset($_POST['hienthikq']))){
                $ngaybatdau=$_POST['ngaybatdau'];
                $ngayketthuc=$_POST['ngayketthuc'];
                $iddm=$_POST['category_id'];
                $export= mysqli_query($con, "SELECT sp.tensp,sum(hdct.soluongban) as tongslban,sp.gia*sum(hdct.soluongban) as tonggiaban,hd.ngaymua from hoadonchitiet as hdct 
                inner join sanpham as sp on sp.id=hdct.idsp 
                inner join hoadon as hd on hd.id=hdct.idhd and hd.ngaymua between '$ngaybatdau 00:00:00' and '$ngayketthuc 23:59:59' inner join danhmuc as dm on dm.id=sp.iddm and dm.id=$iddm 
                group by hdct.idsp");
            }
            if((isset($_POST['export']))){
                $ngaybatdau=$_POST['ngaybatdau'];
                $ngayketthuc=$_POST['ngayketthuc'];
                $iddm=$_POST['category_id'];
                $export1= mysqli_query($con, "SELECT sp.tensp,sum(hdct.soluongban) as tongslban,sp.gia*sum(hdct.soluongban) as tonggiaban,hd.ngaymua from hoadonchitiet as hdct 
                inner join sanpham as sp on sp.id=hdct.idsp 
                inner join hoadon as hd on hd.id=hdct.idhd and hd.ngaymua between '$ngaybatdau 00:00:00' and '$ngayketthuc 23:59:59' inner join danhmuc as dm on dm.id=sp.iddm and dm.id=$iddm 
                group by hdct.idsp");
                // Create new PHPExcel object
                $objPHPExcel = new PHPExcel();
                // Add some data
                $objPHPExcel->setActiveSheetIndex(0);
                // Rename worksheet
                $objPHPExcel->getActiveSheet()->setTitle('Danh sách sản phẩm đã bán');
                
                
                $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Tên sản phẩm');
                $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Số lượng sản phẩm đã bán');
                $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Tổng tiền');
                $numRow=2;
                foreach ($export1 as $pro_export) {
                    $objPHPExcel->getActiveSheet()->setCellValue('A'.$numRow, $pro_export['tensp']);
                    $objPHPExcel->getActiveSheet()->setCellValue('B'.$numRow, $pro_export['tongslban']);
                    $objPHPExcel->getActiveSheet()->setCellValue('C'.$numRow, $pro_export['tonggiaban']);
                }
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="bao_cao'.time().'.xlam"');
                PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2016')->save('php://output');
            };
    
            include 'view/export_report2.php';
            break;
        //Lệnh thoát/đăng xuất
        case 'logout':
            unset($_SESSION['user_id']);
            unset($_SESSION['user']);
            unset($_SESSION['admin']);
            header("Location: ../index.php");
            break;
        default:
        include 'view/menu.php';
            break;
    }
}else{
    include 'view/menu.php';
}
?>