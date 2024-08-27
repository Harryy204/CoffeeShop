
<head>
    <title>Quản lý bình luận</title>
</head>
<?php
if (!$_SESSION['admin']) {
    header("location: index.php?act=login");
}
?>

<body>
    <button class="bg-success fw-bold"><a href="./index.php" class=" text-decoration-none pe-2 text-white"><i class="fa-sharp fa-solid fa-circle-left" style="margin: 5px;"></i>Trang Quản Lý</a></button>
    <h1 class=" text-center text-success">Quản lý bình luận</h1>
    <table class="text-center table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Tên sản phẩm</th>
                <th>Nội dung bình luận</th>
                <th>Ngày bình luận</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // include '../config.php';

            // truy vấn cơ sở dữ liệu để lấy danh sách bình luận
           

            if (mysqli_num_rows($commentResult) > 0) {
                $id_count =1;
                while ($comment = mysqli_fetch_assoc($commentResult)) {
                    echo "<tr>";
                    echo "<td>$id_count</td>";
                    echo "<td>{$comment['tennd']}</td>";
                    // echo"<td name='tensp'><a href='index.php?act=comment_pro'>{$comment['tensp']}</a></td>";
                    echo "<td>{$comment['tensp']}</td>";
                    echo "<td>{$comment['noidung']}</td>";
                    echo "<td>{$comment['ngaybl']}</td>";
                    echo "<td>";
                    echo "<form action='index.php?act=comment_delete' method='POST' onsubmit='return confirmDelete();'>";
                    echo "<input type='hidden' name='comment_id' value='{$comment['id']}'>";
                    echo "<input type='submit' name='delete_comment' class='btn btn-danger' value='Xóa'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                    $id_count++;
                }
            } else {
                echo "<tr><td colspan='5'>Không có bình luận nào</td></tr>";
            }

            // đóng kết nối
            mysqli_close($con);
            ?>
        </tbody>
        <a href=""></a>
    </table>
    <script>
        function confirmDelete(){
            return confirm ("Bạn có chắc muốn xóa bình luận này");
        }
    </script>
</body>

</html>
