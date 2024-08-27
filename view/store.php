<head>
    <title>Cửa hàng</title>
    <style>
        .phantrang{
            text-align:center;
            margin: 30px 0px;
        }
        #phan-trang{
            padding: 13px 20px;
            border-radius:50%;
            text-decoration:none;
            font-size: larger;
            background-color: black;
            color:white;
            word-wrap: break-word;
        }
        #phan-trang:hover   {
            background-color:grey;
            color:black;
            transition: 0.3s;
            text-shadow:2px 2px 5px black;
        }
        #phan-trang:active{
            color:red;
            
        }
        .row{
            margin:30px 0px;
        }
    </style>
</head>

<body>
    <!-- danh mục sản phẩm -->
    
    <div class="container-fluid">
        
        <div class="col-md-12">
        <h2 class="bg-light text-dark text-center p-2 border-bottom">Sản phẩm của cửa hàng</h2>
            <div class="row">
                <?php
                $current_page=$_GET['id'];
                $count_pro= mysqli_query($con, "SELECT COUNT(sanpham.id) as countpro FROM sanpham ");
                $pro_count=mysqli_fetch_array($count_pro);
                $current_page_num=ceil($pro_count['countpro']/8);
                $offset=($current_page-1)*8;
                $record = mysqli_query($con, "SELECT * FROM sanpham order by id asc LIMIT 8 OFFSET ".$offset);
                
                
                while ($row = mysqli_fetch_array($record)) {
                    // lấy tên danh mục từ bảng danhmuc
                   
                    // định dạng giá sản phẩm
                    $formattedPrice = number_format($row['gia'], 0, '', ',');
                    echo '
                    <div class="col-md-6 col-lg-3 mb-3">
                    <form action="cart.php" method="post">
                    <div class="card m-auto" style="width: 18rem;">
                    <img src="./uploadimage/' . $row['img'] . '" class="card-img-top img-fluid" style="height:250px">
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
    <div class="phantrang">
    <?php
        for ($i=1; $i <= $current_page_num ; $i++) { 
            echo ' <a id="phan-trang" href="index.php?act=store&id='.$i.'">'.$i.'</a>';
        }
        ?>
    </div>
    


