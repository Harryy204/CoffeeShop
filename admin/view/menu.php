<head>    
    <title>Trang Admin</title>
</head>
<section class="dashboard">
        <div class="container">
            <h2 class="display-4 text-center text-danger text">Quản Lý</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Xin chào!</h3>
                            <p class="card-text"><?php 
                            echo $_SESSION['admin']; 
                            ?></p>
                            <a href="index.php?act=edit_pro" class="btn btn-primary">Cập nhật tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                    <?php
                        $select_order = $con->prepare("SELECT * FROM `hoadon`");
                        $select_order->execute();
                        $total_order = $select_order->get_result()->num_rows;
                        ?>
                        <div class="card-body">
                            <h3 class="card-title">Hoá đơn</h3>
                            <h3 class="card-text">Số lượng: <?php echo $total_order ?></h3>
                            <a href="index.php?act=orders" class="btn btn-primary">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <?php
                        $select_category = $con->prepare("SELECT * FROM `danhmuc`");
                        $select_category->execute();
                        $total_category = $select_category->get_result()->num_rows;
                        ?>
                        <div class="card-body">
                            <h3 class="card-title">Danh mục sản phẩm</h3>
                            <h3 class="card-text">Số lượng: <?php echo $total_category; ?></h3>
                            <a href="index.php?act=category" class="btn btn-primary">Xem thêm</a>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row mt-4">           
                <div class="col-md-4">
                    <div class="card">
                        <?php
                        $select_products = $con->prepare("SELECT * FROM `sanpham`");
                        $select_products->execute();
                        $total_products = $select_products->get_result()->num_rows;
                        ?>
                        <div class="card-body">
                            <h3 class="card-title">Sản phẩm đã thêm</h3>
                            <h3 class="card-text">Số lượng: <?php echo $total_products; ?></h3>
                            <a href="index.php?act=product" class="btn btn-primary">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="card">
                            <?php
                            $select_users = $con->prepare("SELECT * FROM `nguoidung`");
                            $select_users->execute();
                            $total_users = $select_users->get_result()->num_rows;
                            ?>
                            <div class="card-body">
                                <h3 class="card-title">Người dùng</h3>
                                <h3 class="card-text">Số lượng: <?php echo $total_users; ?></h3>
                                <a href="index.php?act=user" class="btn btn-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>

               

                    <div class="col-md-4">
                        <div class="card">
                        <?php
                        $select_comments = $con->prepare("SELECT * FROM `binhluan`");
                        $select_comments->execute();
                        $total_comments = $select_comments->get_result()->num_rows;
                        ?>
                            <div class="card-body">
                                <h3 class="card-title">Bình luận</h3>
                                <h3 class="card-text">Số lượng: <?php echo $total_comments; ?></h3>
                                <a href="index.php?act=comment" class="btn btn-primary">Xem thêm</a>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- hàng số 3 -->
            <div class="row mt-4">           
                <div class="col-md-4">
                        <div class="card">
                        <?php
                        $select_users = $con->prepare("SELECT * FROM `nguoidung`");
                        $select_users->execute();
                        $total_users = $select_users->get_result()->num_rows;
                        ?>
                        <div class="card-body">
                            <h3 class="card-title">Thống kê theo danh mục</h3>
                            <h3 class="card-text"></h3>
                            <a href="index.php?act=report_category" class="btn btn-primary">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="card">
                        <?php
                        $select_users = $con->prepare("SELECT * FROM `danhmuc`");
                        $select_users->execute();
                        $total_users = $select_users->get_result()->num_rows;
                        ?>
                        <div class="card-body">
                            <h3 class="card-title">Lập báo cáo</h3>
                            <h3 class="card-text"></h3>
                            <a href="index.php?act=export_report" class="btn btn-primary">Xem thêm</a>
                        </div>
                    </div>
                </div>

               

            </div>
        </div>
    </section>


</body>

</html>