<?php

    function category_show(){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        $result=mysqli_query($con, "SELECT * FROM danhmuc ORDER BY id");
    }
    function category_delete($categoryId){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con, "DELETE FROM `danhmuc` WHERE id=$categoryId");
    }
    function category_pro_del($categoryId){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con, "DELETE FROM `sanpham` WHERE iddm=$categoryId");
    }
    function category_insert($category_name){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con, "INSERT INTO `danhmuc`(`tendm`) VALUES ('$category_name')");
    }
  
?>