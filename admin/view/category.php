
<head>
    <title>Thêm sản phẩm</title>
</head>

    <?php

    if (!$_SESSION['admin']) {
        header("location: index.php?act=login");
    }
    ?>

<body>
<button class="bg-success fw-bold"><a href="index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>
<div class="container">
        <p class="text-center fw-bold fs-3 text-success">Thêm Danh Mục Sản Phẩm</p>
        <form action="index.php?act=category_add" method="POST" class="mb-3">
            <div class="input-group">
                <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Tên danh mục" required>
                <button type="submit" name="submit_category" class="btn btn-primary">Thêm danh mục</button>
            </div>
        </form>
    </div>
    <div class="container col-md-6 mt-5">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../model/config.php';
                $id_count = 1;
                $categoryQuery = "SELECT * FROM danhmuc ORDER BY id";
                $result = mysqli_query($con, $categoryQuery);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='text-center'>" .$id_count . "</td>";
                    echo "<td>" . $row['tendm'] . "</td>";
                    echo "<td class='text-center'><a onclick='return confirm(\"Bạn có chắc muốn xoá " . $row['tendm'] . " không?\")'
                    href='index.php?act=category_delete&id=".$row['id']."' class='btn btn-danger'>Xoá</a></td>";
                    echo "</tr>";
                    $id_count++;
                }
                
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>