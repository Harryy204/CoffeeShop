<head>
    <title>Thêm sản phẩm</title>
</head>
<?php
if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}
?>
<body>
    <button class="bg-success fw-bold"><a href="./index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto border mt-3">
                <!-- Tạo form thêm sản phẩm -->
                <form action="index.php?act=product_add" method="POST" enctype="multipart/form-data">
                    <p class="text-center fw-bold fs-3 text-success">Thêm sản phẩm mới</p>

                    <div class="mb-3">
                        <label class="form-label">Nhập tên sản phẩm:</label>
                        <input type="text" name="tensp" class="form-control ml-100" placeholder="Nhập tên sản phẩm" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập giá sản phẩm:</label>
                        <input type="number" min="1" name="gia" class="form-control" placeholder="Nhập giá" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thêm ảnh sản phẩm:</label>
                        <input type="file" name="img" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập số lượng sản phẩm:</label>
                        <input type="number" name="soluong" class="form-control" placeholder="Nhập số lượng" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhập mô tả sản phẩm:</label>
                        <input type="text" name="mota" class="form-control" placeholder="Nhập mô tả" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Chọn danh mục:</label>
                        <select class="form-select" name="category_id">
                            <?php
                            // include '../../config.php';
                            $categoryQuery = "SELECT * FROM danhmuc";
                            $categoryResult = mysqli_query($con, $categoryQuery);
                            while ($category = mysqli_fetch_array($categoryResult)) {
                                echo '<option value="' . $category['id'] . '">' . $category['tendm'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button name="submit" class="bg-danger fs-5 fw-bold mb-3 form-control text-white">Thêm sản phẩm</button>
                </form>
            </div>
        </div>

        <!-- hiển thị sản phẩm -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 m-auto">

                    <table class="table border border-dark table-hover border mt-5">

                        <thead class="bg-dark text-white fs-5 font-monnospace text-center">
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Phân loại</th>
                            <th>Số lượng</th>
                            <th>Mô tả</th>
                            <th>Xóa</th>
                            <th>Cập nhật</th>
                        </thead>

                        <tbody class="text-center">
                            <?php
                         
                            $record = mysqli_query($con, "SELECT sp.tensp,sp.soluong,sp.gia,sp.id,sp.img,sp.mota,dm.tendm from sanpham as sp,danhmuc as dm where sp.iddm=dm.id ");
                            $id_count = 1;
                            while ($row = mysqli_fetch_array($record)) {
                                $description = '<div style="max-width: 200px; word-wrap: break-word; margin:0 auto;">' . $row['mota'] . '</div>';

                                echo "
                                <tr>
                                <td>$id_count</td>
                                <td>$row[tensp]</td>
                                <td>$row[gia]</td>
                                <td><img src= '$row[img]' width='200px' height='150px'></td>
                                <td>$row[tendm]</td>
                                <td>$row[soluong]</td>
                                <td>$description</td>
                                <td><a onclick='return confirm(\"Bạn có chắc muốn xoá ".$row['tensp']." không?\")'
                                href= 'index.php?act=product_delete&id=$row[id]' class='btn btn-outline-danger'>Xóa</a></td>
                                <td><a href='index.php?act=product_update&id=$row[id]'class='btn btn-warning'>Cập nhật</a></td>
                                </tr>
                                ";
                                $id_count++;
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>