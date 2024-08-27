<?php
    function product_show(){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        $record = mysqli_query($con, "SELECT * FROM `sanpham` ORDER BY id desc limit 0,04 ");
    }
    function product_show_one($id){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        $record = mysqli_query($con, "SELECT * FROM `sanpham` WHERE id = '$id'");
        $data = mysqli_fetch_array($record);
    }
    function product_delete($id){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con, "DELETE FROM `sanpham` WHERE id=$id");
    }
    function product_insert($category_name){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con, "INSERT INTO `danhmuc`(`tendm`) VALUES ('$category_name')");
    }
    function product_update($product_name,$product_price,$image_des,$category_id,$product_details,$product_quantity,$id){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        if($image_des=="../uploadimage/"){
            $productQuery="UPDATE `sanpham` SET `tensp`='$product_name', `gia`='$product_price', `iddm`='$category_id', `mota`='$product_details', `soluong`='$product_quantity' WHERE id = '$id'";
        }else{
            $productQuery="UPDATE `sanpham` SET `tensp`='$product_name', `gia`='$product_price', `img`='$image_des', `iddm`='$category_id', `mota`='$product_details', `soluong`='$product_quantity' WHERE id = '$id'";
        }
        mysqli_query($con, $productQuery);
    } 
    function category_getone($id){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        $record = mysqli_query($con, "SELECT * FROM `sanpham` WHERE iddm = '$id'");
    }
?>