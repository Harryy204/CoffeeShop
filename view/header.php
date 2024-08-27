<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- fontawsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
    <!-- <link rel="icon" href="https://nguyenvanhieu.vn/wp-content/uploads/2023/09/cropped-nguyenvanhieu-logo-192x192.png" sizes="192x192"> -->
    <style>
        /* submenu */
        .nav-item ul li > .sub-menu {
        display: none;
        position: absolute;
        }
        .sub-menu {
        display: none;
        position: absolute;
        border: 3px;
        z-index: 2;
        background:black;
        width:max-content;
        height: max-content;
        padding:10px;
        list-style: none;
        
        }
        .navbar ul li:hover .sub-menu {
        display: block;
        }
        .navbar a:hover{
            transform: scale(1.03);
        }
        .nav-item ul li a:hover{
        text-decoration: underline;
        transform: scale(1.03);
        }
        .nav-item ul li a {
        text-decoration: none;
        color: white;
        display: block;
        margin:10px;
        }
        /* boxsanpham */
        .card {
            transition: 0.5s;
            width: 100%;
            overflow: hidden;
        }
        .card:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            transition: 0.4s;
        }
        .card:hover img {
            transform: scale(1.1);
            opacity: 0.85;
        }

        .card img {
            width: 100%;
            transition: 0.5s;
        }
        .banner {
        font-family: 'Roboto', sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        background: url("./images/banner.jpeg") no-repeat;
        background-size: cover;
        background-position: center;
        padding-left: 10px;
        }

        .banner h3 {
            max-width: 50rem;
            margin-top: 15%;
            font-size: 96px;
            text-transform: uppercase;
            color: #fff;
        }

        .banner p {
            max-width: 50rem;
            font-size: 20px;
            padding: 9px;
            color: #fff;
        }

        a.more-btn {
            display: inline-block;
            text-decoration: none;
            background-color: rgba(222, 82, 82, 0.779);
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-transform: uppercase;
            transition: 0.3s;
        }

        a.more-btn:hover {
            background-color: brown;
        }


        /* css nội dung */

        .heading {
            text-align: center;
            text-transform: uppercase;
            padding-top: 20px;
        }

        .about .row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            color: #fff;
            background: rgb(25, 21, 20);
            margin: 0 auto;
        }

        .about .row .image {
            flex: 1 1 40rem;
        }

        .about .row .image img {
            width: 100%;
        }

        .about .row .content {
            flex: 1 1 40rem;
        }

        .about .row .content h3 {
            font-size: 40px;
        }

        .about .row .content p {
            font-size: 20px;
            padding: 10px 0;
        }
        .card-img {
        height: 288px;
        object-fit: cover;
    }
            </style>

    
</head>

<body>
    <!-- phần header -->
    <?php
    // bắt đầu phiên làm viêch
    // session_start();
    $count = 0;
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
    }
    ?>
    <nav class="navbar navbar-expand-lg bg-dark" style="font-family: 'Roboto', sans-serif;">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="./index.php">COFFEE</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto"> 
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php"><i class="fa-solid fa-house" style="margin: 3px;"></i>Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?act=about"><i class="fa-solid fa-users" style="margin: 3px;"></i>Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?act=store&id=1"><i class="fa-solid fa-store" style="margin: 3px;"></i>Thực đơn</a>
                        <ul class="sub-menu">
                            <?php
                             $record = mysqli_query($con, "SELECT * FROM danhmuc ORDER BY id");
                            while ($row = mysqli_fetch_array($record)) {
                                echo'<li style="list"><a href="index.php?act=category_one&id='.$row['id'].'">'.$row['tendm'].'</a></li>';
                            }
                            ?>
                            
                            
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?act=cartView"><i class="fa-solid fa-cart-shopping" style="margin: 3px;"></i>Giỏ hàng(<?php echo $count ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php?act=contact"><i class="fa-solid fa-envelope" style="margin: 3px;"></i>Liên hệ</a>
                    </li>
                </ul>
                <!-- tìm kiếm sản phẩm -->
                <?php 
                ?>
                
                
          <!-- đăng nhập và quản lý -->
          <?php
                if((isset($_GET['act']))&&(($_GET['act']=='login')||($_GET['act']=='register'))){
                    echo '
                    <form method="GET" action="index.php?act=search" class="d-flex"></form>
                    <span class="text-white desktop-menu mobile-only">
                    
                    ';
                   
                echo    '</span>';
                }else{
                echo '
                    <form method="POST" action="index.php?act=search" class="d-flex">
                    <input type="text" name="searchPro" class="form-control form-control-sm me-2" placeholder="Tìm kiếm sản phẩm...">
                    <button type="submit" class="btn btn-outline-light btn-sm"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <span class="text-white desktop-menu mobile-only">
                <i class="fa-solid fa-user-shield" style="margin: 3px;"></i>
                ';
                
                if (isset($_SESSION['user'])) {
                    echo '
                    <a href="index.php?act=edit_pro" class="text-dark text-decoration-none pe-2 text-white">Xin chào: '. $_SESSION['user'] .'</a>';
                    echo '| <a href="index.php?act=logout" class="text-dark text-decoration-none pe-2 text-white"><i class="fas fa-sign-out-alt" style="margin: 3px;"></i>Đăng xuất</a> |';
                } else {
                    echo ' | <a href="index.php?act=login" class="text-dark text-decoration-none pe-2 text-white"><i class="fas fa-sign-out-alt" style="margin: 3px;"></i>Đăng nhập |</a>
                    <a href="index.php?act=register" class="text-dark text-decoration-none pe-2 text-white"></i>Đăng ký |</a>            
                           ';
                }
                // kiểm tra vai trò nếu là admin sẽ hiển thị liên kết đến trang admin
                if (isset($_SESSION['admin'])) {
                    echo '<a href="./admin/index.php" class="text-dark text-decoration-none pe-2 text-white"> Quản lý</a>';
                }
               
            echo    '</span>';
                };
          ?>
   
            </div>
        </div>
    </nav>

          