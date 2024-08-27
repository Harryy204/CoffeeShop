<head>
    <title>Thanh Toán</title>
</head>

<body>
    <?php


    if (mysqli_num_rows($result) > 0) {
        // hiển thị kết quả tìm kiếm
        echo "<h2 class='bg-light text-dark text-center p-2 border-bottom'>Sản phẩm tìm kiếm: '$searchTerm'</h2>";
        echo "<div class='row'>";
        while ($product = mysqli_fetch_assoc($result)) {
            echo "<div class='col-md-6 col-lg-3 mb-3'>";
            echo "<div class='card m-auto text-center' style='width: 18rem;''>";
            echo "<img src='./uploadimage/{$product['img']}' alt='{$product['tensp']}' class='img-fluid' style='height:250px'>";
            echo "<h5 class='fw-bold mt-3'>{$product['tensp']}</h5>";
            echo "<p>Giá: " . number_format($product['gia'], 0, ',', '.') . " VNĐ</p>";
            echo "<a href='index.php?act=details&id={$product['id']}' class='btn btn-danger'>Xem chi tiết</a>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }else {
        echo "<h2 class='bg-light text-dark text-center p-2 border-bottom' style='margin-bottom: 270px;'>Sản phẩm tìm kiếm không tồn tại<br>
        Bạn có thể xem các sản phẩm khác<br> 
        <a href='index.php?act=store&id=1' style='text-decoration: none'>Tại đây</a></h2>";
    }

    ?> 
