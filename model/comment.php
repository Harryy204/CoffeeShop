<?php
    function comment_show(){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con,  "SELECT sp.tensp,bl.id,bl.noidung,bl.ngaybl,nd.tennd from binhluan as bl, sanpham as sp, nguoidung as nd where bl.idsp=sp.id AND nd.id=bl.idnd");
    }
    function comment_delete($id){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
    // thực hiện xóa bình luận từ cơ sở dữ liệu dựa trên $comment_id
            $deleteQuery = "DELETE FROM binhluan WHERE id = '$id'";
        
            if (mysqli_query($con, $deleteQuery)) {
                // bình luận đã được xóa thành công
                header("Location: index.php?act=comment"); 
                exit();
            } else {
                // xử lý lỗi nếu có
                echo "Lỗi: " . mysqli_error($con);
            }
    }
?>