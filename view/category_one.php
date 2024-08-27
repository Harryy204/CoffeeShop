
<head>
<?php
    $row2 = mysqli_fetch_array($record2);
    echo '<title>'.$row2['tendm'].'</title>';
    ?>
</head>

<body>
    <!-- danh mục sản phẩm -->
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
       
             <?php
             echo'
             <h2 class="bg-light text-dark text-center p-2 border-bottom">'.$row2['tendm'].'</h2>';
         ?>
            
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
        
        </div>
    </div>

