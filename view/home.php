<title>COFFEE</title>
<style>

</style>
<body>
       <!-- banner -->
    <div class="banner">
        <h3>Coffee</h3>
        <p>Cà phê là thức uống đơn giản giúp thêm sự tỉnh táo và năng lượng cho ngày mới sảng khoái.</p>
        <a href="index.php?act=store&id=1" class="more-btn">Mua ngay</a>
    </div>

    <!-- giới thiệu -->
    <div class="about">
        <h1 class="heading">Về Chúng Tôi</h1>
        <div class="row">
            <div class="image">
                <img src="./images/aboutt.jpg">
            </div>
            <div class="content">
                <h3>Điều gì khiến cà phê của chúng tôi đặc biệt ?</h3>
                <p>Cà phê chất lượng cao được nhập khẩu từ những nơi uy tín</p>
                <p>Giá cả phải chăng, cà phê thơm ngon</p>
                <a href="index.php?act=about" class="more-btn">Xem thêm</a>
            </div>
        </div>
    </div>
    <!-- menu -->
    <h1 class="heading">Thực đơn</h1>
    <!-- danh mục sản phẩm -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
            <h2 class="bg-light text-dark text-center p-2 border-bottom">Sản phẩm mới</h2>
                <?php
                while ($row = mysqli_fetch_array($record)) {
                    // định dạng giá sản phẩm
                    $formattedPrice = number_format($row['gia'], 0, '', ',');
                    echo '
                    <div class="col-md-6 col-lg-3 mb-3">
                    <form action="index.php?act=cart" method="post">
                    <div class="card m-auto" style="width: 18rem;">
                    <img src=uploadimage/'. $row['img'].' class="card-img-top img-fluid" style="height:250px">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark fw-bold">' . $row['tensp'] . '</h5>
                        <p class="card-text">Giá: ' . $formattedPrice . ' VNĐ</p>
                        <input type="hidden" name="name" value="' . $row['tensp'] . '">
                        <input type="hidden" name="price" value="' . $row['gia'] . '">
                        <div class="d-flex justify-content-between">
                            <input type="hidden" name="quantity" min="1" value="1">
                            <input type="submit" name="addCart" class="btn btn-danger text-white mt-2" value="Thêm vào giỏ hàng">
                            <a href="index.php?act=details&id=' . $row['id'] . '" class="btn btn-danger text-white mt-2">Chi tiết</a>
                        </div>
                    </div>
                    </div>
                    </form>
                    </div>';
                   
                }
                ?>
             
            </div>
            
        </div>
        <div class="col-md-12">
        <div class="row">
          
            <h2 class="bg-light text-dark text-center p-2 border-bottom">Sản phẩm gợi ý cho bạn</h2>
                <?php
                while ($row = mysqli_fetch_array($record_2)) {
                    // định dạng giá sản phẩm
                    $formattedPrice = number_format($row['gia'], 0, '', ',');
                    echo '
                    <div class="col-md-6 col-lg-3 mb-3">
                    <form action="index.php?act=cart" method="post">
                    <div class="card m-auto" style="width: 18rem;">
                    <img src=./uploadimage/'. $row['img'].' class="card-img-top img-fluid" style="height:250px">
                    <div class="card-body text-center">
                        <h5 class="card-title text-dark fw-bold">' . $row['tensp'] . '</h5>
                        <p class="card-text">Giá: ' . $formattedPrice . ' VNĐ</p>
                        <input type="hidden" name="name" value="' . $row['tensp'] . '">
                        <input type="hidden" name="price" value="' . $row['gia'] . '">
                        <div class="d-flex justify-content-between">
                            <input type="hidden" name="quantity" min="1" value="1">
                            <input type="submit" name="addCart" class="btn btn-danger text-white mt-2" value="Thêm vào giỏ hàng">
                            <a href="index.php?act=details&id=' . $row['id'] . '" class="btn btn-danger text-white mt-2">Chi tiết</a>
                        </div>
                    </div>
                    </div>
                    </form>
                    </div>';
                   
                }
                ?>
            </div>
            <button type="button" class="btn btn-danger mx-auto d-block mb-3"><a href="index.php?act=store&id=1" class="text-decoration-none text-white">Cửa Hàng</a></button>
        </div>
    </div>
   
  