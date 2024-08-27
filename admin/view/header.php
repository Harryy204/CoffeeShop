<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- fontawsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
    <style>
        p,
        .card-text {
            padding: 5px;
            background-color: #f5f5f5;
            border-radius: 10px;
            font-size: 20px;
            border: #000;
            margin: 10px 0;
            color: #999;
        }
    </style>
</head>
<?php
if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}
// include '../config.php';
 ?>

<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid text-white">
            <a href="index.php" class="text-decoration-none">
                <h4 class="navbar-brand fw-bold text-white" style="margin: 0;">COFFEE</h4>
            </a>
            <span>
                <i class="fa-solid fa-user-shield"></i>
                Xin chào, 
                <?php 
                echo $_SESSION['admin']; 
                ?>|
                <i class="fas fa-sign-out-alt"></i>
                <a href="index.php?act=logout" class="text-decoration-none text-white">Đăng xuất</a>|
                <a href="../index.php" class="text-decoration-none text-white">Khách truy cập</a>
            </span>
        </div>
    </nav>