<?php
    function report_category_show(){
        $con= mysqli_connect('localhost', 'root', '', 'coffee');
        mysqli_query($con, "SELECT danhmuc.tendm,danhmuc.id,count(sanpham.id) as countsp, min(sanpham.gia) as mingia ,max(sanpham.gia) as maxgia, avg(sanpham.gia) as avggia from sanpham left join danhmuc on danhmuc.id=sanpham.iddm group by danhmuc.id order by danhmuc.id desc");
    }
?>