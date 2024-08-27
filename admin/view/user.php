<head>
    <title>Quản Lý Người Dùng</title>
</head>

<body>
    <?php
   if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}
    // include '../config.php';
    $record = mysqli_query($con, "SELECT * FROM `nguoidung`");
    $id_count = 1;
    ?>

    <button class="bg-success fw-bold"><a href="index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>
    <h1 class=" text-center text-success">Quản Lý Thành Viên</h1>
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Vai Trò</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                while ($row = mysqli_fetch_array($record)) {
                    echo '
                <tr>
                    <td>' . $id_count . '</td>
                    <td>' . $row['tennd'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['sdt'] . '</td>
                    <td>' . $row['role'] . '</td>
                    <td>';
                    echo '<a onclick="return confirm(\'Bạn có chắc chắn muốn xóa ' . $row['tennd'] . ' không?\')"
                    href="index.php?act=user_delete&id=' . $row['id'] . '" class="btn btn-outline-danger">Xóa</a>';

                    echo '</td>
                </tr>';
                    $id_count++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>